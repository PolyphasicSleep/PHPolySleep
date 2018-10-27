<html>
<head>
    <title>Uberman - Polyphasic sleep</title>
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
        <h2>Uberman sleep</h2>
        <p>
            Uberman sleep is probably the most extreme approach to polyphasic sleep. It consists of six naps that are
            distributed perfectly evenly throughout the entire day, with each starting exactly 3 hours and 40 minutes after
            the previous one has ended. Thereby, a ultradian rhythm is achieved (similarly to
            <a href="triphasicSleep.html">Triphasic sleep</a>
            ). Comparably to
            <a href="everymanSleep/e4.html">Everyman 4 sleep</a>
            , <b>this pattern will not work for most people, as it doesn't provide any deep sleep!</b>
            Still, several people have tried and succeeded adapting to this pattern.
            <br><b>It is not recommended to follow this sleep pattern.</b>
        </p>
        <table class="statstable">
            <tr>
                <th>Total sleep time</th>
                <th>2h</th>
            </tr>
            <tr>
                <th>Total number of sleep periods</th>
                <th>6</th>
            </tr>
            <tr>
                <th>Total awake time</th>
                <th>22h</th>
            </tr>
            <tr>
                <th>Sleep time saved <span class="addinfo"><sup>&#x24D8</sup><span>compared to the average sleep time of a 20-year-old (7.5h)</span></span></th>
                <th>5h 30min (&#x2248 73%)</th>
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
        layout::scheduleButton("Uberman");
        ?>

    </div>

</main>

<?php
layout::footer();
?>


</body>
</html>