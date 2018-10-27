<!DOCTYPE html>

<html>
<head>
    <title>Everyman 4 - Polyphasic sleep</title>
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
        <h2>Everyman 4 sleep</h2>
        <p>
            Everyman 4 sleep has only an extremely short nocturnal sleep period.
            <b>This will not be sufficient for many people!</b>
            However, it seems to work for some people. They have a total of four naps spread throughout the day in addition
            to this nocturnal sleep, which makes the pattern very hard to maintain, if possible at all.
            <br><b>It is not recommended to follow this sleep pattern.</b>
        </p>

        <table class="statstable">
            <tr>
                <th>Total sleep time</th>
                <th>3h</th>
            </tr>
            <tr>
                <th>Total number of sleep periods</th>
                <th>5</th>
            </tr>
            <tr>
                <th>Total awake time</th>
                <th>21h</th>
            </tr>
            <tr>
                <th>Sleep time saved <span class="addinfo"><sup>&#x24D8</sup><span>compared to the average sleep time of a 20-year-old (7.5h)</span></span></th>
                <th>4h 30min (60%)</th>
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
                <th class="extreme">extreme</th>
            </tr>

        </table>

        <?php
        layout::scheduleButton("Everyman sleep (4 naps)");
        ?>
    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>