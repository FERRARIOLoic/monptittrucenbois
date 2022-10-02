<?php
session_start();

$pageTitle = 'Contact';

require_once(__DIR__.'/../models/Users.php');

$user_info = User::getAll($_SESSION['user']->user_id);
// var_dump($user_info);die;

//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');

//------------- VIEWS ---------//
include(__DIR__ . '/../views/contact.php');

//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');