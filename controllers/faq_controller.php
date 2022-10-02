<?php
session_start();

$pageTitle = 'Foire aux questions';

require_once(__DIR__.'/../models/faq.php');


//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');

//------------- VIEWS ---------//
include(__DIR__ . '/../views/faq.php');

//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');
