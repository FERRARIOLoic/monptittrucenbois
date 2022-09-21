<?php
session_start();

$pageTitle = 'Actualités';

//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');

//------------- VIEWS ---------//
include(__DIR__ . '/../views/news.php');

//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');