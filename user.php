<!DOCTYPE html>

<html>
<head>
    <title>User profile - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/phpolysleep.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/script.js"></script>
</head>
<body>

<?php
require_once("classes/dataScripts.php");
$dataHandle = new dataScripts();

require_once("classes/timeScripts.php");
$timeHandle = new timeScripts();

require_once("classes/siteSession.php");
$session = new siteSession();
$session->startSession();

require_once("classes/layout.php");

if(isset($_POST["save"])){

    $i = 0;
    while(isset($_POST["startHours".$i])){
        $editedStartTotals[$i] = $timeHandle->parseHHmm($_POST["startHours".$i], $_POST["startMinutes".$i]);
        $editedEndTotals[$i] = $timeHandle->parseHHmm($_POST["endHours".$i], $_POST["endMinutes".$i]);
        $i++;
    }

    if(isset($editedStartTotals) && count($editedStartTotals) > 0 && isset($_SESSION["sleepTimeIds"])
        && count($_SESSION["sleepTimeIds"]) === count($editedStartTotals)){

        $dataHandle->editScheduleTimes(array($editedStartTotals, $editedEndTotals), $_SESSION["sleepTimeIds"]);
    }

}

if(isset($_GET["vfc"])){
    $dataHandle->verifyUser($_GET["vfc"]);
}

layout::header();

?>

<main>
    <div class="basiccontent">
        <?php
        if(isset($_SESSION["userAuth"]) && $_SESSION["userAuth"] == true){
            echo "<h3>Hello, ".$_SESSION["userName"]."!</h3>";

            if(isset($_SESSION["schedule"]) && $_SESSION["schedule"] !== null){
                $currsched = $_SESSION["schedule"];
               # echo "Session";
            } else {
                $currsched = $dataHandle->getSchedule();
               # echo "DB";
            }

            if(!(isset($currsched) && $currsched !== null)){
                echo "<p>You have not selected a schedule yet.</p>
                  <div><a class='scheduleBtn' href='/patterns.php'>Choose a schedule!</a></div><br>";
            } else {
                echo "<p>Your current schedule is ".$currsched.".</p>";
            }

            $sleeptimes = $dataHandle->getCurrentScheduleTimes($_SESSION["userName"]);
            if($sleeptimes !== null && is_array($sleeptimes) && count($sleeptimes[0]) !== 0) {

                //Display times
                echo "<div id='timesdisplay'><h3 style='display:inline-block'>Scheduled sleep times:</h3><span class='editpencil'>
                    <a onclick='showScheduleEditor(true)'>Edit &#x1F589</a></span>";
                $startarray = $sleeptimes[0];
                $endarray = $sleeptimes[1];
                $typearray = $sleeptimes[2];
                $_SESSION["sleepTimeIds"] = $sleeptimes[3];

                $sleepcount = count($startarray);

                for ($i = 0; $i < $sleepcount; $i++) {
                    $starttime = $timeHandle->formatHHmm($startarray[$i]);
                    $endtime = $timeHandle->formatHHmm($endarray[$i]);

                    echo "<p>Start Time: " .$starttime . ", End Time: " . $endtime . " (" . $typearray[$i] . ")</p>";
                }

                //Times Editor
                echo "</div>
                        <div id='timesEditor'>
                            <h3>Edit sleep times</h3>
                            <form action='".$_SERVER['PHP_SELF']."' method='post' style='margin: 0 auto'>";
                                for ($i = 0; $i < $sleepcount; $i++) {
                                    $starthours = $timeHandle->formatHH($startarray[$i]);
                                    $startminutes = $timeHandle->formatmm($startarray[$i]);
                                    $endhours = $timeHandle->formatHH($endarray[$i]);
                                    $endminutes = $timeHandle->formatmm($endarray[$i]);

                                    echo "<p>Start Time: <input type='number' name='startHours".$i."' size='2' value='".$starthours."' max='23' min='0'>
                                    :<input type='number' name='startMinutes".$i."' size='2' value='".$startminutes."' max='59' min='0'>, 
                                    End Time: <input type='number' name='endHours".$i."' size='2' value='".$endhours."' max='23' min='0'>
                                    :<input type='number' name='endMinutes".$i."' size='2' value='".$endminutes."' max='59' min='0'> (" .$typearray[$i]. ")</p>";
                                }
                                echo "<input class='submit' style='float:left' type='button' onclick='showScheduleEditor(false)' name='cancel' value='Cancel'>
                                    <input class='submit' style='float:right' type='submit' name='save' value='Save changes'>";

                            echo "</form>";
                echo "</div>";

            }

            echo "<hr>";
            echo "<p><a href='/changepassword.php'>Change password</a></p>";
            echo "<p><a href='/logout.php'>Click here to log out.</a></p>";
            echo "<p><a href='/deletedaccount.php'>Click here to delete this account.</a></p>";
        } else {
            echo "<h3>You are not logged in.</h3> <a href='/login.php'>Log in here.</a>";
        }
        ?>
    </div>
</main>

<?php
layout::footer();
?>


</body>
</html>