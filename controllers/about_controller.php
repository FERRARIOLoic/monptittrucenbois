<?php
session_start();

$pageTitle = '&Agrave; propos de moi';


//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');

//------------- VIEWS ---------//
include(__DIR__ . '/../views/about.php');

//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');
