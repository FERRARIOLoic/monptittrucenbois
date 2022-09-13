<?php 
session_start();


$user_admin = $_SESSION['users_admin']??0;
$username = $_SESSION['username']??'';

//------------- DATABASE CONNECT ---------//

//------------- LOGIC ---------//
require_once(__DIR__ . '/../models/products.php');


$categories_list = Product::getCategory();
require_once(__DIR__ . '/../config/regex.php');


//------------- VIEWS ---------//
include(__DIR__ . '/../views/header.php');
include(__DIR__ . '/../views/navbar.php');