<?php

class dataScripts
{
    private $recCounter;
    private $timeZoneOffset;

    function __construct(){
        define("SERVERNAME", "aamx4dtkuzakop.cf8znimwntrp.eu-central-1.rds.amazonaws.com:3306");
        define("USERNAME", "bob");
        define("PASSWORD", "UpFR37Hijp0pYp5vmpMDvZKI4rUUxJ");
        $this->recCounter = 0;
        $this->timeZoneOffset = date("Z");
    }


    //Schedule management

    public function setSchedule($schedule){
        $conn = $this->connectToDB();

        $now = time();
        $userID = $this->getIDByName($_SESSION["userName"]);

        $insertSchedQuery="INSERT INTO Schedules (userID, schedulename, starttimestamp) VALUES (?,?,?)";
        $readyQuery = $conn->prepare($insertSchedQuery);
        $readyQuery->bind_param("isi", $userID, $schedule, $now);
        $readyQuery->execute();
        $scheduleID = $conn->insert_id;
        $this->setScheduleTimes($schedule, $scheduleID);
        $_SESSION["schedule"] = $schedule;
    }

    public function getSchedule(){
        $conn = $this->connectToDB();
        $userId = $this->getIDByName($_SESSION["userName"]);

        $getSchedQuery = "SELECT schedulename FROM Schedules
                            WHERE userID = ?
                            ORDER BY starttimestamp DESC
                            LIMIT 1";
        $readyQuery = $conn->prepare($getSchedQuery);
        $readyQuery->bind_param("i", $userId);
        $readyQuery->execute();
        $readyQuery->bind_result($currSched);
        $readyQuery->fetch();

        return $currSched;
    }


    //Schedule times management

    private function setScheduleTimes($schedule, $scheduleID){
        $conn = $this->connectToDB();
        require_once("../classes/timeScripts.php");
        $timesHandle = new timeScripts();

        $timesInfo = $timesHandle->getDefaultTimes($schedule);
        $oldInfo = $this->getOldScheduleTimes($_SESSION["userName"], $schedule);

        if($oldInfo !== null && count($oldInfo[0]) !== 0){
            $timesInfo = $oldInfo;

            #Only for debugging
            //header("Location: /debug.php?info="."Acquiring old info!?");
        }

        $starttimes = $timesInfo[0];
        $endtimes = $timesInfo[1];
        $sleeptypes = $timesInfo[2];

        $sleepscount = count($starttimes);

        for($i = 0; $i < $sleepscount; $i++) {
            $inserttimes = "INSERT INTO scheduletimes (scheduleID, starttime, endtime, sleeptype) VALUES (?,?,?,?)";
            $readyquery = $conn->prepare($inserttimes);
            $readyquery->bind_param("iiis",$scheduleID, $starttimes[$i], $endtimes[$i], $sleeptypes[$i]);
            $readyquery->execute();

            //Only for debugging:
           /* if(!($readyquery = $conn->prepare($inserttimes))){
                header("Location: /debug.php?info=".$conn->error);
            }
            if(!($readyquery->bind_param("iiis",$scheduleID, $starttimes[$i], $endtimes[$i], $sleeptypes[$i]))){
                header("Location: /debug.php?info=".$conn->error);
            }
            if(!($readyquery->execute())){
                header("Location: /debug.php?info=".$conn->error);
            } */
        }
    }

    public function getCurrentScheduleTimes($username){
        $conn = $this->connectToDB();

        $timesByName = "SELECT st.starttime, st.endtime, st.sleeptype, st.id FROM scheduletimes st
                        INNER JOIN 
                            (SELECT max(s.id) AS id
                            FROM (Schedules s
                            INNER JOIN
                                (SELECT * FROM Users WHERE username = ?) userdude
                            ON userdude.id = s.userID)) sy
                        ON sy.id = st.scheduleID";
        $readyquery = $conn->prepare($timesByName);
        $readyquery->bind_param("s", $username);
        $readyquery->execute();
        $readyquery->bind_result($starttimes, $endtimes, $sleeptypes, $ids);

        //Only for debugging
        /*
        if(!($readyquery = $conn->prepare($timesByName))){
            header("Location: /debug.php?info=".$conn->error);
        }
        if(!($readyquery->bind_param("s", $username))){
            header("Location: /debug.php?info=".$conn->error);
        }
        if(!($readyquery->execute())){
            header("Location: /debug.php?info=".$conn->error);
        }
        if(!($readyquery->bind_result($starttimes, $endtimes, $sleeptypes, $ids))){
            header("Location: /debug.php?info=".$conn->error);
        }*/

        $i = 0;
        while($readyquery->fetch()){
            $startarray[$i] = $starttimes;
            $endarray[$i] = $endtimes;
            $typearray[$i] = $sleeptypes;
            $idarray[$i] = $ids;
            $i++;
        }
        if(!isset($startarray) || !isset($endarray) || !isset($typearray)){
            return null;
        }
        return array($startarray, $endarray, $typearray, $idarray);
    }

    public function getOldScheduleTimes($username, $schedulename){
        $conn = $this->connectToDB();

        $recentTimes = "SELECT st.starttime, st.endtime, st.sleeptype, sy.starttimestamp FROM scheduletimes st
                        INNER JOIN 
                            (SELECT s.id AS id, starttimestamp
                            FROM (Schedules s
                            INNER JOIN
                                (SELECT * FROM Users WHERE username = ?) userdude
                            ON userdude.id = s.userID)
                            WHERE s.schedulename = ?
                            ORDER BY s.starttimestamp DESC
                            LIMIT 1, 1
                           ) sy
                        ON sy.id = st.scheduleID";
        $readyquery = $conn->prepare($recentTimes);
        $readyquery->bind_param("ss", $username, $schedulename);
        $readyquery->execute();
        $readyquery->bind_result($starttimes, $endtimes, $sleeptypes, $starttimestamp);
        $i = 0;
        while($readyquery->fetch()){
            $startarray[$i] = $starttimes;
            $endarray[$i] = $endtimes;
            $typearray[$i] = $sleeptypes;
            $timestamp = $starttimestamp;
            $i++;
        }

        return array($startarray, $endarray, $typearray, $timestamp);
    }

    public function editScheduleTimes($newTimes, $ids){
        $conn = $this->connectToDB();
        $starttimes = $newTimes[0];
        $endtimes = $newTimes[1];

        $rows = count($ids);
        $updateTimes = "UPDATE scheduletimes SET starttime = ?, endtime = ? WHERE id = ?";
        for($i = 0; $i < $rows; $i++){
            $readyquery = $conn->prepare($updateTimes);
            $readyquery->bind_param("iii", $starttimes[$i], $endtimes[$i], $ids[$i]);
            $readyquery->execute();
        }
    }


    //User management

    public function createUser($passwordinput, $usernameinput, $emailinput){
        require_once("Mail.php");
        $ismailvalid = true;
        $results = "";

        if(!filter_var($emailinput, FILTER_VALIDATE_EMAIL) ){
            echo "Invalid email <br>";
            $ismailvalid = false;
        }

        $conn = $this->connectToDB();

        //Create new user profile, if it's not a duplicate
        if($ismailvalid) {
            $userswithname = $this->getIDByName($usernameinput);
            $userswithmail = $this->getIDByMail($emailinput);

            if ($userswithname !== null) {
                $results .= "Username taken.<br>";
            }
            if ($userswithmail !== null) {
                $results .= "There already exists a user with this email.";
            }
            if ($userswithmail === null && $userswithname === null) {
                $verification = $this->randomString(30);
                $now = time();
                $zero = 0;

                $insertuserquery = "INSERT INTO Users (username, password, email, verified, creationtimestamp, verificationcode) VALUES (?,?,?,?,?,?)";
                $readyquery = $conn->prepare($insertuserquery);
                $readyquery->bind_param("sssiis", $usernameinput, $passwordinput, $emailinput, $zero, $now, $verification);
                $readyquery->execute();
                $results .= "Successfully created profile.";

                /*
                //Send verification Email
                $mailsubject = "Verify your Polyphasic Sleep account";
                $emailmessage = "
                <html>
                    <head>
                        <title>
                        Verify your Polyphasic Sleep account
                        </title>
                    </head>
                
                    <body>
                        <h1>Hello,".$usernameinput."</h1>
                        <h2>Please verify your account for Polyphasic Sleep!</h2>
                        <a href='"."?vfc=".$verification."'>Click here</a>
                        <p>or copy this TODO: insert url URL into your browser:</p>
                        <p>"URL."?vfc=".$verification."</p>
                  
                    </body>
                </html>";

                $mailheaders = "MIME-Version: 1.0" . "\r\n";
                $mailheaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $mailheaders .= 'From: <polyphasic.info@gmail.com>' . "\r\n";

                mail($emailinput, $mailsubject, $emailmessage, $mailheaders);
                */

                $_SESSION["userAuth"] = true;
                $_SESSION["userName"] = $usernameinput;
                session_regenerate_id(false);
                header("Location: /user.php");
            }
        }
        $conn->close();
        return $results;
    }

    public function verifyUser($vfc){
        $conn = $this->connectToDB();
        $verification = "UPDATE Users SET verified = 1 WHERE verificationcode = ?";
        $readyquery = $conn->prepare($verification);
        $readyquery->bind_param("s", $vfc);
        $success = $readyquery->execute();
        if($success){
            $user = "SELECT username WHERE verificationcode = ?";
            $userquery = $conn->prepare($user);
            $userquery->bind_param("s", $vfc);
            $userquery->execute();
            $userquery->bind_result($username);
            $userquery->fetch();

            $_SESSION["userName"] = $username;
            $_SESSION["userAuth"] = true;
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($username){
        $conn = $this->connectToDB();

        $deluname = "DELETE FROM Users WHERE username = ?";

        $delquery = $conn->prepare($deluname);
        $delquery->bind_param("s", $username);

        if($delquery->execute()){
            $results="Account successfully deleted";
        } else {
            $results="Failed to delete account. Sorry =/";
        }

        $conn->close();

        $_SESSION["userAuth"] = false;
        unset($_SESSION["userName"]);

        session_regenerate_id(true);
        return $results;
    }

    public function authUser($passwordinput, $usernameinput){

        $conn = $this->connectToDB();

        $result=null;
        $checkauth = "SELECT password FROM Users WHERE username = ?";
        $readyquery = $conn->prepare($checkauth);
        $readyquery->bind_param("s", $usernameinput);
        $readyquery->execute();
        $readyquery->bind_result($result);
        $readyquery->fetch();

        $auth = false;

        if($result !== null){
            if($result === $passwordinput){
                $auth=true;
            }
        }
        if($auth){
            $results = true;
            $_SESSION["userAuth"] = true;
            $_SESSION["userName"] = $usernameinput;
        } else {
            $results = "Could not authenticate password/user combination.";
        }
        $conn->close();
        return $results;
    }

    public function changePW($newPW1, $newPW2){
        $conn = $this->connectToDB();
        $username = $_SESSION["userName"];

        if($newPW1 === $newPW2){
            $changePW = "UPDATE users SET password = ? WHERE username = ?";
            $readyquery = $conn->prepare($changePW);
            $readyquery->bind_param("ss", $newPW1, $username);
            $readyquery->execute();
            return true;
        }
        return "Passwords don't match";
    }

    private function getIDByName($username){
        $conn = $this->connectToDB();

        $searchuname = "SELECT id FROM Users WHERE username = ?";
        if($searchnamequery = $conn->prepare($searchuname)){
            $searchnamequery->bind_param("s", $username);
            $searchnamequery->execute();
            $searchnamequery->bind_result($userswithname);
            $searchnamequery->fetch();
            $searchnamequery->close();
        } else {
            echo $conn->errno." ".$conn->error;
            $userswithname = null;
        }
        return $userswithname;
    }

    private function getIDByMail($emailinput){
        $conn = $this->connectToDB();
        $searchmail = "SELECT id FROM Users WHERE email = ?";
        if($searchmailquery = $conn->prepare($searchmail)){
            $searchmailquery->bind_param("s", $emailinput);
            $searchmailquery->execute();
            $searchmailquery->bind_result($userswithmail);
            $searchmailquery->fetch();
            $searchmailquery->close();
        } else {
            echo $conn->errno." ".$conn->error;
            $userswithmail = null;
        }
        return $userswithmail;
    }

    //Global database management

    private function connectToDB(){

        // Create connection
        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, "PolySleepDB");
        // Check connection
        if ($conn->connect_error) {
            die("Could not connect to database: ".$conn->errno." ".$conn->error);
        }
        return $conn;
    }



    //Generate Token
    private function randomString($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $characters = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $characters []= $keyspace[random_int(0, $max)];
        }
        return implode('', $characters);
    }

}