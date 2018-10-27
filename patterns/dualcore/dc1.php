<!DOCTYPE html>

<html>
<head>
    <title>Dual core 1 - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/phpolysleep.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/script.js"></script>
</head>
<body>

<?php

require_once("../../classes/siteSession.php");
$session = new siteSession();
$session->startSession();

require_once("../../classes/layout.php");
layout::header();


?>

<main>
    <?php
    layout::patternMenu();

    ?>
    <div class="patterncontent col-9">
        <h2>Dual core 1 sleep</h2>
        <p>
            Dual core 1 sleep is considered the polyphasic sleep pattern providing the most health benefits, because it
            matches the natural human sleep cycle very well. Additional to two nocturnal sleep periods, it features one
            nap in the early afternoon.
        </p>

        <table class="statstable">
            <tr>
                <th>Total sleep time</th>
                <th>5h 20min</th>
            </tr>
            <tr>
                <th>Total number of sleep periods</th>
                <th>3</th>
            </tr>
            <tr>
                <th>Total awake time</th>
                <th>18h 40min</th>
            </tr>
            <tr>
                <th>Sleep time saved <span class="addinfo"><sup>&#x24D8</sup><span>compared to the average sleep time of a 20-year-old (7.5h)</span></span></th>
                <th>2h 10min (&#x2248 29%)</th>
            </tr>
            <tr>
                <th>Difficulty level <span class="addinfo"><sup>&#x24D8</sup><span>
                Different polyphasic sleep patterns require varying amounts of discipline and consistency,
                so some patterns are more difficult to successfully maintain than others.
                <br><br>Possible values in ascending order:
                <br>- easy
                <br>- medium
                <br>- advanced
                <br>- hard
                <br>- extreme
                </span></span></th>
                <th class="adv">advanced</th>
            </tr>

        </table>

        <?php
        layout::scheduleButton("Dual core (1 nap)");
        ?>
    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>