<?php
include("/classes/siteSession.php");
//include("/phpolysleep/classes/layout.php");
include("/classes/dataScripts.php");

$session = new siteSession();
$session->startSession();

$dataHandle = new dataScripts();

$selectedSched = $_POST["schedule"];

$dataHandle->setSchedule($selectedSched);
