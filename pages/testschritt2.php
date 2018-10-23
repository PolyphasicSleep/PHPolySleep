<html>
<head>
    <title>User profile</title>
    <link rel="icon"
          type="image/png"
          href="/phpolysleep/resources/images/favicon.png">
    <link rel="stylesheet" href="../phpolysleep.css">
    <script src="../script.js"></script>
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
        <?php
        if(isset($_SESSION["userAuth"]) && $_SESSION["userAuth"] == true){
            echo "<h3>Hello, ".$_SESSION["userName"]."</h3>";
            echo "<hr>";
        } else {
            echo "<h3>You are not logged in.</h3> <a href='index.php'>Log in here.</a>";
        }
        ?>
    </div>
</main>

<?php
layout::footer();
?>


</body>
</html>