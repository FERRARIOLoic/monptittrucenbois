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




//!------------- CATEGORY - CREATE / MODIFY ---------//

//?------------- ADD NEW CATEGORY ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and empty($_POST['id_category'])) {

    //------------- NAME CATEGORY ---------//
    $category_name = filter_input(INPUT_POST, 'categories', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($category_name)) {
        $test_name = filter_var($category_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["category_name"] = "Erreur de format !!";
        } else {
            if (strlen($category_name) <= 1 || strlen($category_name) >= 70) {
                $error["category_name"] = "La longueur du nom n'est pas bonne";
            }
        }
    } else {
        $error["category_name"] = "Sélectionner un nom !!";
    }

    //------------- ADD DATA ---------//
    $category = new Category();
    $category->setCategoryName($category_name);
    $resultNewCategory = $category->save();
}

//?------------- UPDATE CATEGORY ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['id_category'])) {

    $action_category = filter_input(INPUT_POST, 'action_category', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
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

    if ($action_category == "delete") {
        $category_info = Category::delete($id_category);
    } else {

        $category_info = Category::getCategory($id_category);



        //------------- NAME CATEGORY ---------//
        $category_name = filter_input(INPUT_POST, 'categories', FILTER_SANITIZE_SPECIAL_CHARS) ?? $category_info->categories_name;
        if (!empty($category_name)) {
            $test_name = filter_var($category_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
            if (!$test_name) {
                $error["category_name"] = "Erreur de format !!";
            } else {
                if (strlen($category_name) <= 1 || strlen($category_name) >= 70) {
                    $error["category_name"] = "La longueur du nom n'est pas bonne";
                }
            }
        } else {
            $error["category_name"] = "Sélectionner un nom !!";
        }

        //------------- ADD DATA ---------//
        $resultUpdateCategory = Category::update($id_category, $category_name);
    }
}


include(__DIR__ . '/../views/templates/header.php');


//!------------- VIEWS ---------//
if ($_SESSION['user']->users_admin == '1') {
    $pageTitle = "Gestion des catégories";
    include(__DIR__ . '/../views/admin/categoryCreateModify.php');
} else {

    //------------- ADMIN UNAUTHORIZED ---------//
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
include(__DIR__ . '/Footer.php');
