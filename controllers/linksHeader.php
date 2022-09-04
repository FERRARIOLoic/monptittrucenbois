<?php 

//------------- DATABASE CONNECT ---------//
require(__DIR__.'/../utils/connect.php');
require(__DIR__.'/../models/mpteb.php');

//------------- LOGIC ---------//
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../config/regex.php');


//------------- VIEWS ---------//
include(__DIR__ . '/../views/header.php');
include(__DIR__ . '/../views/navbar.php');