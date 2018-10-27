<!DOCTYPE html>

<html>
<head>
    <title>Login - Polyphasic Sleep</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/phpolysleep.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/script.js"></script>
</head>
<body>

<?php


include("../classes/dataScripts.php");
$datahandle = new datascripts();

include("../classes/siteSession.php");
$session = new sitesession();
$session->startsession();

$results = null;



if(isset($_POST["login"])){
    //login button pressed
    $passwordinput = checkinput($_POST["pw"]);
    $usernameinput = checkinput($_POST["name"]);

    $login = true;
    $results = $datahandle->authuser($passwordinput, $usernameinput);
    if(is_bool($results) && $results === true){
        header("Location: /phpolysleep/pages/user.php");
    }
} else if(isset($_POST["new"])) {
    //create new button pressed
    $passwordinput = checkinput($_POST["pw"]);
    $usernameinput = checkinput($_POST["name"]);
    $emailinput = checkinput($_POST["email"]);

    $login = false;
    $results = $datahandle->createuser($passwordinput, $usernameinput, $emailinput);
}

function checkinput($input){
    return htmlspecialchars(stripslashes(trim($input)));
}

include("../classes/layout.php");
layout::header();

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
            <input type="email" name = "email" maxlength="30" required placeholder="you@domain.extension" size="30"><br><br>
            <span><input type="checkbox" name="datapolicy" required style="display:inline-block"></span>
            <label for="datapolicy" style="font-size: 0.7em; line-height: 1">I consent that my data will be stored secured by my password and email.</label><br>
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
        <form action="<?php echo $_SERVER['PHP_SELF']."#logIn"; ?>" method="post">
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