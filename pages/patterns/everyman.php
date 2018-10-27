<html>
<head>
    <title>Everyman - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/phpolysleep/resources/images/favicon.png">
    <link rel="stylesheet" href="../../phpolysleep.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="../../script.js"></script>
</head>
<body>

<?php

include("../../classes/siteSession.php");
$session = new siteSession();
$session->startSession();

include("../../classes/layout.php");
layout::header();

?>

<main>
    <?php
    layout::patternMenu();

    ?>
    <div class="patterncontent col-9">
        <h2>Everyman sleep</h2>
        <p>Everyman sleep features only a single core sleep that is longer than 20 minutes. It needs to provide enough deep
            sleep for the entire day, as naps don't supply any deep sleep.</p>
        <h4 class="subPatternTitle">Further information on the different types of Everyman sleep</h4>
        <div class="flexbox">

            <div><a class="subPattern" href="everymanSleep/e2.html">Everyman 2</a></div>
            <div><a class="subPattern" href="everymanSleep/e3.html">Everyman 3</a></div>
            <div><a class="subPattern" href="everymanSleep/e4.html">Everyman 4</a></div>

        </div>
    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>