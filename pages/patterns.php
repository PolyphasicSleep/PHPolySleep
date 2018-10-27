<html>
<head>
    <title>Patterns - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/phpolysleep/resources/images/favicon.png">
    <link rel="stylesheet" href="../phpolysleep.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="../script.js"></script>
</head>
<body>

<?php

include("../classes/siteSession.php");
$session = new siteSession();
$session->startSession();

include("../classes/layout.php");
layout::header();

?>

<main>
    <?php
    layout::patternMenu();
    ?>
    <div class="patterncontent col-9">
        <h2>Sleep patterns</h2>
        <p>
            There are several different known polyphasic sleep patterns, with each one of them having specific requirements and
            benefits. They vary in total sleep time, number of daily sleep periods and distribution of sleep time between those.
            Therefore, some polyphasic patterns are significantly harder to adapt to and to maintain than others.
            <br><br>
            Generally speaking, the more advanced a sleep pattern is, the more precise the timing of the different sleep periods
            needs to be and the higher the required levels of consistency are. Thus, those sleep patterns managing to cut down
            total sleep time by considerably large amounts need appropriate discipline to work properly. To adapt to a different
            sleep cycle and maintain it, <b>consistency is key</b>.
            <br><br>
            Polyphasic sleep is still a quite unexplored field considering scientific findings, as those are very rare.
            Therefore, it can't be guaranteed for everyone to work for them. Some people might perfectly follow all the
            instructions perfectly, but still don't manage to fully adapt to a desired polyphasic sleep pattern.
            <b>If you unsuccessfully try to adapt to a pattern for longer than 3-4 weeks, you should discontinue your efforts
                as it is very likely not to work for you at all.</b> However, there might still be another polyphasic sleep pattern
            suitable for you, so don't let yourself get discouraged.

        </p>
    </div>
</main>

<?php
layout::footer();
?>


</body>
</html>