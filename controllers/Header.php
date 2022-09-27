<?php 

//------------- DATABASE CONNECT ---------//

//------------- LOGIC ---------//
require_once(__DIR__ . '/../models/products.php');
require_once(__DIR__ . '/../models/categories.php');


$categories_list = Category::getCategory();
require_once(__DIR__ . '/../helpers/regex.php');


//------------- VIEWS ---------//
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');