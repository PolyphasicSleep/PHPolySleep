<!DOCTYPE html>

<html>
<head>
    <title>Dual core 3 - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/genstyles.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/scripts.js"></script>
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
        <h2>Dual core 3 sleep</h2>
        <p>
            For Dual core sleep, the two nocturnal sleep periods are shortened to just 90 minutes each to cut down the total
            sleep time by a considerable amount. However, it requires high levels of consistency to maintain, as there are
            three naps spread throughout the day that need to be timed precisely to be effective.
        </p>

        <table class="statstable">
            <tr>
                <th>Total sleep time</th>
                <th>4h</th>
            </tr>
            <tr>
                <th>Total number of sleep periods</th>
                <th>5</th>
            </tr>
            <tr>
                <th>Total awake time</th>
                <th>20h</th>
            </tr>
            <tr>
                <th>Sleep time saved <span class="addinfo"><sup>&#x24D8</sup><span>compared to the average sleep time of a 20-year-old (7.5h)</span></span></th>
                <th>3h 30min (&#x2248 47%)</th>
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
                <th class="hard">hard</th>
            </tr>

        </table>

        <?php
        layout::scheduleButton("Dual core (3 naps)");
        ?>
    </div>
</main>

<?php
layout::footer();
?>


</body>
</html>