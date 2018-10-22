<html>
 <head>
  <title>PHP Test</title>
     <link rel="stylesheet" href="phpolysleep.css">
     <script src="Home.js"></script>
 </head>
 <body>

 <?php

 include("testclass.php");
 testclass::header();

 $login = $_POST["login"];

 $passwordinput = htmlspecialchars($_POST["pw"]);
 $usernameinput = htmlspecialchars($_POST["name"]);

 if($login !== null){
     //Login button pressed
     $login = true;
 } else {
     //Create new button pressed
     $login = false;
 }

 $servername = "aamx4dtkuzakop.cf8znimwntrp.eu-central-1.rds.amazonaws.com:3306";
 $username = "bob";
 $password = "zweiundzwanzig";

 // Create connection
 $conn = new mysqli($servername, $username, $password);

 // Check connection
 if ($conn->connect_error) {
     echo("Connection 1 failed: " . $conn->connect_error);
     $conn = new mysqli("localhost", $username, $password);
     if ($conn->connect_error) {
         die("Connection 2 failed: " . $conn->connect_error);
     }
 }
 echo "Connected successfully";
 echo "<br>";

 //Query to create database with
 $createquery = "CREATE DATABASE IF NOT EXISTS TestBase";

 if($conn->query($createquery) === TRUE){
     echo "Create DB: TOO EZ <br>";
 } else {
     echo "Create DB: Get rekt <br>";
 }

 $conn = new mysqli($servername, $username, $password, "TestBase");
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 echo "Connected successfully";
 echo "<br>";

$createtablequery = "CREATE TABLE IF NOT EXISTS Users (
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL)";

 if($conn->query($createtablequery) === TRUE){
     echo "Create Table: TOO EZ <br>";
 } else {
     echo "Create Table: Get rekt <br>";
 }

 if(!$login){
     $insertuserquery = "INSERT INTO Users (username, password) VALUES (?,?)";
     $readyquery = $conn->prepare($insertuserquery);
     $readyquery->bind_param("ss", $usernameinput, $passwordinput);

     if($readyquery->execute()){
         echo "Create Row: TOO EZ <br>";
     } else {
         echo "Create Row: Get rekt <br>   ". $conn->error;
     }
 } else {
     $checkauth = "SELECT password FROM Users WHERE username = $usernameinput";

     $result = $conn->query($checkauth);
     if($result->num_rows > 0){
         echo "Search user : TOO EZ <br>";
     } else {
         echo "Search user : Get rekt <br>   ". $conn->error;
     }

     $auth = false;

     if($result->num_rows > 0){
        while($user = $result->fetch_assoc()){
            if($user["password"] === $passwordinput){
                $auth = true;
                break;
            }
        }
     }
     if($auth){
         echo "Successfully authenticated";
     } else {
         echo "Get rekt m8: Sike, that's the wrong password";
     }


 }



 testclass::footer();
 ?>


 </body>
</html>