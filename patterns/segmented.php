<!DOCTYPE html>

<html>
<head>
    <title>Segmented Sleep - Polyphasic sleep</title>
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
        <h2>Segmented Sleep</h2>
        <p>
            This pattern divides the nightly sleep period in two parts, with tow hours in between the segments. This method
            was very commonin pre-industrial eras, before the invention of the light bulb lead to the end of this sleep habit.
            While it doesn't reduce total sleep time by a lot, it provides many different benefits mainly regarding health.
        </p>
        <table class="statstable">
            <tr>
                <th>Total sleep time</th>
                <th>7h</th>
            </tr>
            <tr>
                <th>Total number of sleep periods</th>
                <th>2</th>
            </tr>
            <tr>
                <th>Total awake time</th>
                <th>17h</th>
            </tr>
            <tr>
                <th>Sleep time saved <span class="addinfo"><sup>&#x24D8</sup><span>compared to the average sleep time of a 20-year-old (7.5h)</span></span></th>
                <th>30min (&#x2248 7%)</th>
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
                <th class="med">medium</th>
            </tr>

        </table>

        <?php
        layout::scheduleButton("Segmented Sleep");
        ?>
    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>