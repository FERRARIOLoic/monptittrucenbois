<?php
session_start();

$pageTitle = 'Accueil';


//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');

//------------- VIEWS ---------//
include(__DIR__ . '/../views/home.php');

//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');
