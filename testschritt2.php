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

 $passwordinput = htmlspecialchars($_POST["pw"]);
 $usernameinput = htmlspecialchars($_POST["name"]);

 $class = new testclass();

 $servername = "localhost";
 $username = "bob";
 $password = "zweiundzwanzig";

 // Create connection
 $conn = new mysqli($servername, $username, $password);

 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
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

 $insertuserquery = "INSERT INTO Users (username, password) VALUES (?,?)";
 $readyquery = $conn->prepare($insertuserquery);
 $readyquery->bind_param("ss", $usernameinput, $passwordinput);

 if($readyquery->execute()){
     echo "Create Row: TOO EZ <br>";
 } else {
     echo "Create Row: Get rekt <br>   ". $conn->error;
 }


 testclass::footer();
 ?>


 </body>
</html>