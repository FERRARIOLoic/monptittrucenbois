<?php
session_start();

$pageTitle = 'Actualités';

require_once(__DIR__ . '/../models/Products.php');
require_once(__DIR__ . '/../models/Events.php');

$eventsPending = Event::getPending();
$ProductsLast = Product::getLast();
// var_dump($eventsPending);die;

//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');

//------------- VIEWS ---------//
include(__DIR__ . '/../views/news.php');

//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');