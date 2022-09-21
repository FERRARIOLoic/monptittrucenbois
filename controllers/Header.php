<?php 

//------------- DATABASE CONNECT ---------//

//------------- LOGIC ---------//
require_once(__DIR__ . '/../models/products.php');


$categories_list = Product::getCategory();
require_once(__DIR__ . '/../helpers/regex.php');


//------------- VIEWS ---------//
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');