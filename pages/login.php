
<html>
<head>
    <title>PHP Test</title>
    <link rel="icon"
          type="image/png"
          href="/phpolysleep/resources/images/favicon.png">
    <link rel="stylesheet" href="../phpolysleep.css">
    <script src="../script.js"></script>
</head>
<body>

<?php
define("SERVERNAME", "aamx4dtkuzakop.cf8znimwntrp.eu-central-1.rds.amazonaws.com:3306");
define("USERNAME", "bob");
define("PASSWORD", "zweiundzwanzig");

include("siteSession.php");
$session = new siteSession();
$session->startSession();

$loggedout = false;
$results = null;

if(isset($_POST["login"])){
    //Login button pressed
    $login = true;
    $results = authUser();
} else if(isset($_POST["new"])) {
    //Create new button pressed
    $login = false;
    $results = createUser();
} else {
    if($_SESSION["userAuth"]) {
        $_SESSION["userAuth"] = false;
        $loggedout=true;
    }
}

function createUser(){
    $passwordinput = checkinput($_POST["pw"]);
    $usernameinput = checkinput($_POST["name"]);
    $emailinput = checkinput($_POST["email"]);
    $ismailvalid = true;
    $results = "";

    if(!filter_var($emailinput, FILTER_VALIDATE_EMAIL) ){
        echo "Invalid email <br>";
        $ismailvalid = false;
    }

    $conn = connectToDB();

    //Create new user profile, if it's not a duplicate
    if($ismailvalid) {
        $searchuname = "SELECT id FROM Users WHERE username = ?";
        if($searchnamequery = $conn->prepare($searchuname)){
            $searchnamequery->bind_param("s", $usernameinput);
            $searchnamequery->execute();
            $searchnamequery->bind_result($userswithname);
            $searchnamequery->fetch();
            $searchnamequery->close();
        } else {
            echo $conn->errno." ".$conn->error;
        }




        $searchmail = "SELECT id FROM Users WHERE email = ?";
        if($searchmailquery = $conn->prepare($searchmail)){
            $searchmailquery->bind_param("s", $emailinput);
            $searchmailquery->execute();
            $searchmailquery->bind_result($userswithmail);
            $searchmailquery->fetch();
            $searchmailquery->close();
        } else {
            echo $conn->errno." ".$conn->error;
        }

        if ($userswithname !== null) {
            $results .= "Username taken.";
        }
        if ($userswithmail !== null) {
            $results .= "There already exists a user with this email.";
        }
        if ($userswithmail === null && $userswithname === null) {
            $insertuserquery = "INSERT INTO Users (username, password, email) VALUES (?,?,?)";
            $readyquery = $conn->prepare($insertuserquery);
            $readyquery->bind_param("sss", $usernameinput, $passwordinput, $emailinput);
            $readyquery->execute();
            $results .= "Successfully created profile.";
            $_SESSION["userAuth"] = true;
            $_SESSION["userName"] = $usernameinput;
            header("Location: /pages/testschritt2.php");
        }
    }
    $conn->close();
    return $results;
}

function authUser(){
    $passwordinput = checkinput($_POST["pw"]);
    $usernameinput = checkinput($_POST["name"]);
    $results = "";

    $conn = connectToDB();

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
        $results = "Successfully authenticated <br>Hello, $usernameinput!";
        $_SESSION["userAuth"] = true;
        $_SESSION["userName"] = $usernameinput;
        header("Location: /pages/testschritt2.php");
    } else {
        $results = "Could not authenticate password/user combination.";
    }
    $conn->close();
    return $results;
}

function connectToDB(){
    // Create connection
    $conn = new mysqli("localhost", USERNAME, PASSWORD);

    $local = true;

    // Check connection
    if ($conn->connect_error) {
        echo("Local Connection failed: " . $conn->connect_error);
        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD);
        if ($conn->connect_error) {
            die("Server Connection failed: " . $conn->connect_error);
        }
        $local = false;
    }
    #echo "Connected successfully";
    #echo "<br>";

    //Query to create database with
    $createquery = "CREATE DATABASE IF NOT EXISTS TestBase";

    if($conn->query($createquery) === TRUE){
        #echo "Create DB: TOO EZ <br>";
    } else {
        echo "Create DB: Get rekt <br>";
    }

    if(!$local){
        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, "TestBase");
    } else {
        $conn = new mysqli("localhost", USERNAME, PASSWORD, "TestBase");
    }

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    #echo "Connected successfully";
    #echo "<br>";

    $createtablequery = "CREATE TABLE IF NOT EXISTS Users (
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL)";

    if($conn->query($createtablequery) === TRUE){

    } else {
        echo "Create Table: Get rekt <br>";
    }

    $columns = $conn->query("SHOW COLUMNS FROM Users LIKE 'email'");
    $exists = $columns->num_rows > 0;
    if(!$exists){
        $droptable = "DROP TABLE IF EXISTS Users";
        $conn->query($droptable);
        $conn->query($createtablequery);
        echo "Rebuilt table <br>";
    }

    return $conn;
}

function checkinput($input){
    return htmlspecialchars(stripslashes(trim($input)));
}


include("layout.php");
layout::header();

if($loggedout){
    echo '
     <main>
        <div class="basiccontent">
            <h3>You have been successfully logged out.</h3>
        </div>
     </main>
     ';
}
?>



<main>
    <div class="basiccontent, loginform">
        <h2>Sign up</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <i>Username</i><br>
            <input type="text" name="name" maxlength="30" required placeholder="John C."><br>
            <i>Password</i><br>
            <input type="password" name="pw" maxlength="30" required placeholder="***********" size="30"><br>
            <i>Email</i><br>
            <input type="email" name = "email" maxlength="30" required placeholder="you@domain.extension" size="30"><br>
            <br>
            <input type="submit" value = "Sign up" name="new" class="submit">
        </form>
        <p class="warning">
            <?php
            if($results !== null && !$login){
                echo $results;
            }
            ?>
        </p>

        <hr>
        <h2 id="logIn">Log in</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <i>Username</i><br>
            <input type="text" name="name" maxlength="30" required><br>
            <i>Password</i><br>
            <input type="password" name="pw" maxlength="30" required><br>
            <br>
            <input type="submit" value = "Log in" name="login" class="submit">
        </form>
        <p class="warning">
            <?php
            if($results !== null && $login){
                echo $results;
            }
            ?>
        </p>

    </div>
</main>






<?php

layout::footer();

?>
</body>
</html>