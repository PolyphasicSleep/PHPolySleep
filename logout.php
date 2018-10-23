<html>
<head>
    <title>Patterns - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/phpolysleep/resources/images/favicon.png">
    <link rel="stylesheet" href="phpolysleep.css">
    <script src="script.js"></script>
</head>
<body>

<?php

include("siteSession.php");
$session = new siteSession();
$session->startSession();

include("layout.php");
layout::header();

?>

<main>
    <div class="basiccontent">
        <h3>You have been logged out successfully.</h3>
        <hr>
        <a href="/phpolysleep/home.php">Home</a><br>
        <a href="/phpolysleep/index.php">Log in again</a>
    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>