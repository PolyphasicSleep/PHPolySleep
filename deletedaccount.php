<!DOCTYPE html>

<html>
<head>
    <title>User profile - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/genstyles.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/scripts.js"></script>
</head>
<body>

<?php

include("classes/siteSession.php");
$session = new siteSession();
$session->startSession();

include("classes/dataScripts.php");
$dataHandle = new dataScripts();

if(isset($_SESSION["userAuth"]) && $_SESSION["userAuth"] == true){
    $results = $dataHandle->deleteUser($_SESSION["userName"]);
    $session->destroySession();
} else {
    $results = "<h3>You are not logged in.</h3> <a href='/login.php'>Log in here.</a>";
}


require_once("classes/layout.php");
layout::header();

?>

<main>
    <div class="basiccontent">
        <?php
            echo $results;
        ?>
    </div>
</main>

<?php
layout::footer();
?>


</body>
</html>