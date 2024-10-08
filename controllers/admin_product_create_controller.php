<?php
session_start();

require_once(__DIR__ . '/../models/Addresses.php');
require_once(__DIR__ . '/../models/Users.php');
require_once(__DIR__ . '/../models/Woods.php');
require_once(__DIR__ . '/../models/Products.php');
require_once(__DIR__ . '/../models/Categories.php');
require_once(__DIR__ . '/../models/Carriers.php');
require_once(__DIR__ . '/../models/Orders.php');
require_once(__DIR__ . '/../models/Events.php');
require_once(__DIR__ . '/../helpers/modals.php');
require_once(__DIR__ . '/../helpers/regex.php');


$pageTitle = 'Page administrateur';
$admin_view = $_GET['display'] ?? '';

$no_information = "<span class='textUnknown'>Non renseignée</span>";

//------------- LINKS ---------//

//------------- DATA ---------//
$users_list = User::getAll();

//?------------- GET DATA ---------//
$woodList = Wood::getWood();
$categoriesList = Category::getCategory();
$ProductsList = Product::getProduct();


$action_order = trim((string) filter_input(INPUT_POST, 'action_order', FILTER_SANITIZE_SPECIAL_CHARS));
$action_event = trim((string) filter_input(INPUT_POST, 'action_event', FILTER_SANITIZE_SPECIAL_CHARS));

//!------------- PRODUCT - CREATE ---------//

$productsListCategories = Category::getAll();

//?------------- ADD PRODUCT ---------//

// var_dump($_POST['id_product']);die;

//?------------ GET PRODUCT INFO AND REDIRECT ---------//

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['id_product'])) {
    $id_product = intval(filter_input(INPUT_POST, 'id_product', FILTER_SANITIZE_NUMBER_INT));

    $ProductInfo = Product::getProduct($id_product);

    $categoryInfo = (Category::getCategory($ProductInfo->id_category))->id_category;
    $woodInfo = (Wood::getWood($ProductInfo->id_wood))->id_wood;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' and empty($_POST['id_product'])) {
    

    //------------- ID_CATEGORY ---------//
    $id_category = intval(filter_input(INPUT_POST, 'id_category', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_category)) {
        $test_id_category = filter_var($id_category, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_id_category) {
            $error["id_category"] = "Erreur de format !!";
        }
    } else {
        $error["id_category"] = "Sélectionner une catégorie!!";
    }

    //------------- NAME ---------//
    $product_name = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($product_name)) {
        $test_name = filter_var($product_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["product_name"] = "Erreur de format !!";
        } else {
            if (strlen($product_name) <= 1 || strlen($product_name) >= 70) {
                $error["product_name"] = "La longueur du nom n'est pas bonne";
            }
        }
    } else {
        $error["product_name"] = "Sélectionner un nom !!";
    }

    //------------- ID_WOOD ---------//
    $id_wood = intval(filter_input(INPUT_POST, 'id_wood', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_wood)) {
        $test_id_wood = filter_var($id_wood, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_id_wood) {
            $error["id_wood"] = "Erreur de format !!";
        }
    } else {
        $error["id_wood"] = "Sélectionner une catégorie!!";
    }

    //------------- DESCRIPTION ---------//
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($description)) {
        $test_description = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_description) {
            $error["description"] = "Erreur de format !!";
        } else {
            if (strlen($description) <= 1 || strlen($description) >= 70) {
                $error["description"] = "La longueur du nom n'est pas bonne";
            }
        }
    } else {
        $error["description"] = "Sélectionner un nom !!";
    }

    //------------- WEIGHT ---------//
    $weight = intval(filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($weight)) {
        $test_weight = filter_var($weight, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_weight) {
            $error["weight"] = "Erreur de format !!";
        }
    } else {
        $error["weight"] = "Sélectionner une catégorie!!";
    }

    //------------- PRICE ---------//
    $price = intval(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($price)) {
        $test_price = filter_var($price, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_price) {
            $error["price"] = "Erreur de format !!";
        }
    } else {
        $error["price"] = "Sélectionner une catégorie!!";
    }


    //------------- ADD DATA ---------//
    $product = new Product();
    $product->setIdCategory($id_category);
    $product->setProductName($product_name);
    $product->setIdWood($id_wood);
    $product->setDescription($description);
    $product->setWeight($weight);
    $product->setPrice($price);
    $resultCreate = $product->save();
}









include(__DIR__ . '/../views/templates/header.php');


//!------------- VIEWS ---------//
if ($_SESSION['user']->users_admin == '1') {
        $pageTitle = "Création d'un produit";
        include(__DIR__ . '/../views/admin/productsCreate.php');
} else {

    //------------- ADMIN UNAUTHORIZED ---------//
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
include(__DIR__ . '/Footer.php');
