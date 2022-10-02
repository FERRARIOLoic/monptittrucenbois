<?php
session_start();

require_once(__DIR__ . '/../models/Products.php');
require_once(__DIR__ . '/../models/Categories.php');
require_once(__DIR__ . '/../models/Orders.php');
require_once(__DIR__ . '/../helpers/regex.php');

$id_product = intval(filter_input(INPUT_GET, 'id_product', FILTER_SANITIZE_NUMBER_INT));


$product_info = Product::getProduct($id_product);
// var_dump($product_info);die;
$pageTitle = $product_info->categories_name;

//------------- PRODUCTS ALL LIST ---------//
$products_list = Product::getAll();

//------------- PRODUCTS CATEGORY LIST ---------//
$products_list_category = Product::getCategory($id_product);
// var_dump($products_list_category);die;

//!------------- ORDER PRODUCT ---------//
$action_product = filter_input(INPUT_POST, 'action_product', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' and $action_product == 'order') {

    //------------- ID PRODUCT ---------//
    $id_product = intval(filter_input(INPUT_POST, 'id_product', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_product)) {
        $test_id_product = filter_var($id_product, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_id_product) {
            $error["id_product"] = "Erreur !!";
        }
    } else {
        $error["id_product"] = "Sélectionner un produit !!";
    }
    //------------- ID PRODUCT ---------//
    $quantity = intval(filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($quantity)) {
        $test_quantity = filter_var($quantity, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_quantity) {
            $error["quantity"] = "Erreur !!";
        } else {
            if (strlen($quantity) <= 1 || strlen($quantity) >= 70) {
                $error["quantity"] = "Quantité incorrecte";
            }
        }
    } else {
        $error["quantity"] = "Sélectionner un Quantité !!";
    }
    // var_dump($_SESSION['user']->user_id);die;

    //------------- ADD DATA ---------//
    $Order = new Order();
    $Order->setProductId($id_product);
    $Order->setUserId($_SESSION['user']->user_id);
    $Order->setQuantity($quantity);
    $resultCreate = $Order->save();
    // var_dump($resultCreate);
    // die;



}








//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');

//------------- VIEWS ---------//
include(__DIR__ . '/../views/product_info.php');

//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');
