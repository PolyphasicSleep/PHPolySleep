<!DOCTYPE html>

<html>
<head>
    <title>GET AWAY FROM HERE</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/phpolysleep.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/script.js"></script>
</head>
<body>

<?php


require_once("classes/dataScripts.php");
$datahandle = new datascripts();

require_once("classes/siteSession.php");
$session = new sitesession();
$session->startsession();

if($_GET["CIId4ip5f3xG7vUSwpGJHhDFAoMWua"]==="0S4elSy3Z6cL7Wh1MKWRtfCAU30amb"){
    echo $datahandle->deleteEVERYTHING();
    echo $datahandle->createEVERYTHING();
} else {
    header("Location: /index.php");
}

?>



<main>
    <div class="basiccontent, loginform">

    </div>
</main>

</body>
</html>