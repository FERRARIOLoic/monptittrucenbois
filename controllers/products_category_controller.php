<?php
session_start();

require_once(__DIR__.'/../models/products.php');

$category_id = intval(filter_input(INPUT_GET,'category_id',FILTER_SANITIZE_NUMBER_INT));
// var_dump($category_id);die;


$page_title_get = Product::getCategory($category_id);
$pageTitle = $page_title_get->categories;

//------------- PRODUCTS ALL LIST ---------//
$products_list = Product::getAll();

//------------- PRODUCTS CATEGORY LIST ---------//
$products_list_category = Product::getAll($category_id);
// var_dump($products_list_category);die;


//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');

//------------- VIEWS ---------//
include(__DIR__ . '/../views/products_category.php');

//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');
