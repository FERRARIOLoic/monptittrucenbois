<?php

$infoWorking = $_GET['workingInfo'];
switch ($infoWorking) {
    case 1:
        $title = "Le chantournage";
        break;
    case 2:
        $title = "La pyrogravure";
        break;
    case 3:
        $title = "Le tournage sur bois";
        break;
}

$pageTitle = $title.', c\'est quoi ?';

//------------- LINKS ---------//
require_once(__DIR__ . '/linksHeader.php');

//------------- VIEWS ---------//
switch ($infoWorking) {
    case 1:
        include(__DIR__ . '/../views/workingInfoChantournage.php');
        break;
    case 2:
        include(__DIR__ . '/../views/workingInfoPyrogravure.php');
        break;
    case 3:
        include(__DIR__ . '/../views/workingInfoTournage.php');
        break;
}

//------------- LINKS ---------//
require_once(__DIR__ . '/linksFooter.php');
