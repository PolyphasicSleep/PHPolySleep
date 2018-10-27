<!DOCTYPE html>

<html>
<head>
    <title>Dual core - Polyphasic sleep</title>
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
        <h2>Dual core sleep</h2>
        <p>
            As the name suggests, this pattern features two longer core sleep periods that are complemented by several naps.
            Different approaches to this method vary in the exact number of naps, which gives them their concrete names.
        </p>

        <h4 class="subPatternTitle">Further information on the different types of Dual core sleep</h4>
        <div class="flexbox">
            <div><a class="subPattern" href="/patterns/dualcore/dc1.php">Dual Core 1</a></div>
            <div><a class="subPattern" href="/patterns/dualcore/dc2.php">Dual core 2</a></div>
            <div><a class="subPattern" href="/patterns/dualcore/dc3.php">Dual core 3</a></div>
        </div>
    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>