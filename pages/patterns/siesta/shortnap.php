<html>
<head>
    <title>Siesta Sleep (short nap) - Polyphasic sleep</title>
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
        <h2>Siesta sleep with short nap</h2>
        <p>
            The short nap featured in this sleep pattern is very powerful. Not only does it provide a boost of energy and
            motivation, but it also allows to reduce the duration of nightly sleep considerably. Therefore, it is a very
            popular polyphasic sleep pattern.
        </p>
        <table class="statstable">
            <tr>
                <th>Total sleep time</th>
                <th>6h 20min</th>
            </tr>
            <tr>
                <th>Total number of sleep periods</th>
                <th>2</th>
            </tr>
            <tr>
                <th>Total awake time</th>
                <th>17h 40min</th>
            </tr>
            <tr>
                <th>Sleep time saved <span class="addinfo"><sup>&#x24D8</sup><span>compared to the average sleep time of a 20-year-old (7.5h)</span></span></th>
                <th>1h 10min (&#x2248 16%)</th>
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
        layout::scheduleButton("Siesta sleep (short nap)");
        ?>

    </div>
</main>

<?php
layout::footer();
?>


</body>
</html>