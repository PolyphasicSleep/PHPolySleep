<!DOCTYPE html>

<html>
<head>
    <title>Triphasic Sleep - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/phpolysleep.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/script.js"></script>
</head>
<body>

<?php

include("/classes/siteSession.php");
$session = new siteSession();
$session->startSession();

include("/classes/layout.php");
layout::header();


?>

<main>
    <?php
    layout::patternMenu();

    ?>
    <div class="patterncontent col-9">
        <h2>Triphasic sleep</h2>
        <p>
            Triphasic sleep consists of three sleep periods with a duration of 90 minutes each. Those sleep periods are
            distributed quite evenly throughout the day. If the sleep periods are scheduled with exactly 6.5 hours in between
            each other, it is considered a ultradian rhythm (see also: <a href="ubermanSleep.html">Uberman sleep</a>),
            which means the complete sleep/wake-cycle repeat after just 8 hours, significantly less than the normal 24 hours.
            This can help make the sleep pattern more consistent.
        </p>
        <table class="statstable">
            <tr>
                <th>Total sleep time</th>
                <th>4h 30min</th>
            </tr>
            <tr>
                <th>Total number of sleep periods</th>
                <th>3</th>
            </tr>
            <tr>
                <th>Total awake time</th>
                <th>19h 30min</th>
            </tr>
            <tr>
                <th>Sleep time saved <span class="addinfo"><sup>&#x24D8</sup><span>compared to the average sleep time of a 20-year-old (7.5h)</span></span></th>
                <th>3h (40%)</th>
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
        layout::scheduleButton("Triphasic Sleep");
        ?>

    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>