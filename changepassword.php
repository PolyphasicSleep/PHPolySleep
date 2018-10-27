<!DOCTYPE html>

<html>
<head>
    <title>Change password - Polyphasic Sleep</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/phpolysleep.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/script.js"></script>
</head>
<body>

<?php
$reset = false;


require_once("classes/dataScripts.php");
$datahandle = new datascripts();

require_once("classes/siteSession.php");
$session = new sitesession();
$session->startsession();

$results = null;

if(isset($_GET["rpc"])){
    //CONFIRM FIRST!!!!

    $reset = true;
}



if(isset($_POST["change"])){
    //Change button pressed

    $newPW1 = checkinput($_POST["newPW1"]);
    $newPW2 = checkinput($_POST["newPW2"]);
    if(!isset($_POST["oldPW"])){
        //Reset password, doesn't require old password
        $results = $datahandle->changePW($newPW1, $newPW2);
    } else {
        //Change password normally

        $oldPW = checkinput($_POST["oldPW"]);

        $auth = $datahandle->authUser($oldPW, $_SESSION["userName"]);

        if (is_bool($auth) && $auth === true) {
            $results = $datahandle->changePW($newPW1, $newPW2);
        } else {
            $results = $auth;
        }


    }

    if (is_bool($results) && $results === true) {
        $results = "Successfully changed password.";
    }
}

function checkinput($input){
    return htmlspecialchars(stripslashes(trim($input)));
}

require_once("classes/layout.php");
layout::header();

?>



<main>
    <div class="basiccontent, loginform">
        <h2>Change password</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <?php
            if(!$reset){
                echo' <i>Current password</i><br>
            <input type="password" name="oldPW" maxlength="30" required placeholder="********"><br>';
            }
            ?>
            <i>New password</i><br>
            <input type="password" name="newPW1" maxlength="30" required placeholder="********"><br>
            <i>Repeat new password</i><br>
            <input type="password" name="newPW2" maxlength="30" required placeholder="********"><br>
            <br>
       <!--     <input class='submit' style='float:left' type='button' onclick='showScheduleEditor(false)' name='cancel' value='Cancel'> -->
            <input class='submit' type='submit' name='change' value='Save changes'>
        </form>
        <p class="warning">
            <?php
            if($results !== null){
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