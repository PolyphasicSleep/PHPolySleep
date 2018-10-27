<!DOCTYPE html>

<html>
<head>
    <title>Patterns - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/phpolysleep.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/script.js"></script>
</head>
<body>

<?php

require_once("classes/siteSession.php");
$session = new siteSession();
$session->startSession();

$_SESSION["userAuth"] = false;
unset($_SESSION["userName"]);

session_regenerate_id(false);

$session->destroySession();

require_once("classes/layout.php");
layout::header();

?>

<main>
    <div class="basiccontent">
        <h3>You have been logged out successfully.</h3>
        <hr>
        <a href="/index.php">Home</a><br>
        <a href="/login.php">Log in again</a>
    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>