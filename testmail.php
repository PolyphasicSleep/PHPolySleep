<!DOCTYPE html>

<html>
<head>
    <title>GET AWAY FROM HERE</title>
    <link rel="icon"
          type="image/png"
          href="/resources/images/favicon.png">
    <link rel="stylesheet" href="/genstyles.css">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="/scripts.js"></script>
</head>
<body>

<?php


require_once("classes/dataScripts.php");
$datahandle = new datascripts();

require_once("classes/siteSession.php");
$session = new sitesession();
$session->startsession();

if($_GET["CIId4ip5f3xG7vUSwpGJHhDFAoMWua"]==="0S4elSy3Z6cL7Wh1MKWRtfCAU30amb"){
    $from = "noreply.polyphasicsleep@gmail.com";
    $to = "polyphasic.info@gmail.com";
    $namefrom = "Koenig";
    $nameto = "BOB";
    $subject = "TESTAUTOMAT";
    $message = "getrektm8";
    $result = $datahandle->sendMail($from, $namefrom, $to, $nameto, $subject, $message);
    if(is_array($result)){
        foreach ($result as $key=>$value){
            echo "{$key} => {$value}<br> ";
        }
    }
}