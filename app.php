<html>
<head>
    <title>App - Polyphasic sleep</title>
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
        <h2 style="text-align: center">Use our new Android App</h2>
        <p style="text-align: center">This app makes polyphasic sleeping easy!</p>
        <a href="https://play.google.com/store/apps/details?id=com.productivity.android.polyphasicsleep">
            <img src="/phpolysleep/resources/images/getitonplaybtn.png" style="max-width:300px;height:auto;display:block;margin-left: auto;margin-right: auto">
        </a>
        <img src="/phpolysleep/resources/images/notAvailable_on_the_App_Store_(black).png" style="max-width:300px;height:auto;display:block;margin-left: auto;margin-right: auto;margin-top:5%; margin-bottom:5%">

    </div>
</main>

<?php
layout::footer();
?>


</body>
</html>