<!DOCTYPE html>

<html>
<head>
    <title>Home - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="phpolysleep.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/script.js"></script>
</head>
<body>

<?php

require_once("classes/siteSession.php");
$session = new siteSession();
$session->startSession();

include("classes/layout.php");
layout::header();

?>

<main>
    <div class="basiccontent">
        <h2>How it works</h2>
        <p>
            Sleep consists of diffferent phases. Some of them are really important for mental and physical regeneration,
            such as deep sleep and REM sleep, whereas others don't really provide great benefits. This leads to the term
            <em>sleep quality</em>: The higher the percentage of REM sleep and deep sleep, the higher the overall
            sleep quality, as it provides more recovery.
            <br><br>
            The idea of polyphasic sleep is to time sleep periods in a specific way in order to get those important sleep
            stages prioritized. Thereby, they are entered earlier and last longer, whereas other sleep stages take up
            significantly less time, so that the total sleep time can be decreased while maintaining or even increasing
            the amounts of deep sleep and REM sleep.
            <br><br>
            One of the most important mechanisms to achieve that is <b>REM rebound</b>. By precisely timing sleep periods,
            it is possible to use this phenomenon to nearly instantly enter REM sleep after falling asleep, whereas
            an average person usually enters REM sleep not before around 70 minutes after falling asleep. REM sleep doesn't
            last very long, though. This is why these REM sleep-dense naps last around 20 minutes each.
            <br><br>
            There are many different <a href="Patterns.html">polyphasic sleep patterns</a> that serve various purposes.
            Some try to "simply" reduce total sleep time as much as possible, whereas others even provide several health
            benefits. However, although there is already a great diversity regarding different polyphasic sleep patterns,
            it is certainly possible to discover new approaches.
            <br><br>
            Unfortunately, there is a serious lack of research regarding polyphasic sleep, which is why some phenomenons
            can't be explained yet. For example, <a href="sleepPatterns/ubermanSleep.html">Uberman sleep</a> and
            <a href="sleepPatterns/everymanSleep/e4.html">Everyman 4 sleep</a> lack sufficient deep sleep, yet some people
            still successfully maintain those.
            <br><br>
        </p>
        <!--    <h2>What this website does</h2>
            <p>
                Adapting to a polyphasic sleep pattern and maintaining it requires a lot of discipline, strict timing
                and consistency (depending on the complexity of the pattern). It can be quite challenging to organize
                and to keep track of sleep times.<br>
                For most polyphasic sleep patterns, especially the more advanced ones, adaption is very difficult. Often,
                it is recommended to first start in a different polyphasic pattern to make the transition easier and increase
                success rates.
                <br><br>
                This website provides valuable help regarding these by automatically keeping track of your progress and
                planning your sleep times.
            </p>
            <br>
            <div class="loginbtn"><a>Get started now</a></div> -->
    </div>
</main>

<?php
layout::footer();
?>


</body>
</html>