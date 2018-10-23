<html>
<head>
    <title>Contact - Polyphasic sleep</title>
    <link rel="icon"
          type="image/png"
          href="/phpolysleep/resources/images/favicon.png">
    <link rel="stylesheet" href="phpolysleep.css">
    <script src="script.js"></script>
</head>
<body>

<?php

include("siteSession.php");
$session = new siteSession();
$session->startSession();

include("layout.php");
layout::header();

?>

<main>
    <div class="basiccontent">
        <br>
        <h2 class="contactquest">Is there anything you want to tell us?</h2>
        <br>
        <h2 class="contactquest">Do you have any questions, suggestions, or ideas to improve our service?</h2>
        <br>
        <h2 class="contactquest">Let us know!</h2>
        <br>
        <div style="text-align: center">
            <a class="compemail" href="mailto:polyphasic.info@gmail.com">polyphasic.info@gmail.com</a>
        </div>
    </div>
</main>

<?php
layout::footer();
?>


</body>
</html>