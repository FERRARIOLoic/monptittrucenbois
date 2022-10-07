<?php

if (!isset($_SESSION)) {
    header('location: /accueil.html');
    exit;
}

//------------- DATABASE CONNECT ---------//

//------------- LOGIC ---------//
require_once(__DIR__ . '/../models/Products.php');
require_once(__DIR__ . '/../models/Categories.php');


$categories_list = Category::getCategory();
require_once(__DIR__ . '/../helpers/regex.php');


//------------- VIEWS ---------//
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');
