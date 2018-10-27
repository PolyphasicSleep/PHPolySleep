<!DOCTYPE html>

<html>
<head>
    <title>Everyman 3 - Polyphasic sleep</title>
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
        <h2>Everyman 3 sleep</h2>
        <p>
            Everyman 3 sleep is the most popular type of everyman sleep. A short nocturnal sleep period of 3.5 hours combined
            with three naps throughout the day provide sufficient quality sleep for most people, while requiring only very
            little total sleep time.
        </p>

        <table class="statstable">
            <tr>
                <th>Total sleep time</th>
                <th>4h 30min</th>
            </tr>
            <tr>
                <th>Total number of sleep periods</th>
                <th>4</th>
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
        layout::scheduleButton("Everyman sleep (3 naps)");
        ?>
    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>