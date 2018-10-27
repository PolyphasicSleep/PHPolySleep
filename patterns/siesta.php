<!DOCTYPE html>

<html>
<head>
    <title>Siesta Sleep - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/genstyles.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/scripts.js"></script>
</head>
<body>

<?php

require_once("../classes/siteSession.php");
$session = new siteSession();
$session->startSession();

require_once("../classes/layout.php");
layout::header();


?>

<main>
    <?php
    layout::patternMenu();

    ?>
    <div class="patterncontent col-9">
        <h2>Siesta sleep</h2>
        <p>Siesta sleep is probably the most popular polyphasic sleep pattern. A sleep period in the early afternoon
            complements nightly sleep. There are different approaches to siesta sleep which are primarily differentiated by
            the duration of the nap.
        </p>

        <h4 class="subPatternTitle">Further information on the different types of Siesta sleep</h4>
        <div class="flexbox">
            <div><a class="subPattern" href="/patterns/siesta/longnap.php">Long nap</a></div>
            <div><a class="subPattern" href="/patterns/siesta/shortnap.php">Short nap</a></div>
        </div>
    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>