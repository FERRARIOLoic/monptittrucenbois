<?php
session_start();

$pageTitle = 'Contact';

//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');

//------------- VIEWS ---------//
include(__DIR__ . '/../views/contact.php');

//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');