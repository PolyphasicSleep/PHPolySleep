<html>
<head>
    <title>Siesta Sleep (long nap) - Polyphasic sleep</title>
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
        <h2>Siesta sleep with long nap</h2>
        <p>
            With a comparably long nap consisting of 90 minutes of sleep in the early afternoon,
            nightly sleep time can be reduced significantly in this polyphasic pattern. The nap also provides a boost of
            energy for the rest of the day and helps with physical regeneration as it covers all important sleep phases.
        </p>
        <table class="statstable">
            <tr>
                <th>Total sleep time</th>
                <th>6h 30min</th>
            </tr>
            <tr>
                <th>Total number of sleep periods</th>
                <th>2</th>
            </tr>
            <tr>
                <th>Total awake time</th>
                <th>17h 30min</th>
            </tr>
            <tr>
                <th>Sleep time saved <span class="addinfo"><sup>&#x24D8</sup><span>compared to the average sleep time of a 20-year-old (7.5h)</span></span></th>
                <th>1h (&#x2248 13%)</th>
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
        layout::scheduleButton("Siesta sleep (long nap)");
        ?>

    </div>
</main>

<?php
layout::footer();
?>


</body>
</html>