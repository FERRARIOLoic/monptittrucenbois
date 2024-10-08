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

//!------------- EVENT CREATE ---------//

//?------------- ADD NEW EVENT ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $action_event == 'create') {

    //------------- NAME EVENT ---------//
    $events_name = trim((string) filter_input(INPUT_POST, 'events_name', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($events_name)) {
        $test_name = filter_var($events_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["events_name"] = "Erreur de format !!";
        } else {
            if (strlen($events_name) <= 1 || strlen($events_name) >= 70) {
                $error["events_name"] = "La longueur n'est pas bonne";
            }
        }
    } else {
        $error["events_name"] = "Sélectionner un évènement !!";
    }

    //------------- DESCRIPTION EVENT ---------//
    $events_description = trim((string) filter_input(INPUT_POST, 'events_description', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($events_description)) {
        $test_name = filter_var($events_description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["events_description"] = "Erreur de format !!";
        } else {
            if (strlen($events_description) <= 1 || strlen($events_description) >= 200) {
                $error["events_description"] = "La longueur n'est pas bonne";
            }
        }
    } else {
        $error["events_description"] = "Sélectionner un évènement !!";
    }
    //------------- START DATE EVENT ---------//
    $events_start_date = trim((string) filter_input(INPUT_POST, 'events_start_date', FILTER_SANITIZE_SPECIAL_CHARS));
    $events_start_date = !empty($events_start_date) ? $events_start_date: date('Y-m-d');
    if (!empty($events_start_date)) {
        $test_name = filter_var($events_start_date, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["events_start_date"] = "Erreur de format !!";
        } else {
            if (strlen($events_start_date) <= 1 || strlen($events_start_date) >= 200) {
                $error["events_start_date"] = "La longueur n'est pas bonne";
            }
        }
    } else {
        $error["events_start_date"] = "Sélectionner un évènement !!";
    }
    //------------- END DATE EVENT ---------//
    $events_end_date = trim((string) filter_input(INPUT_POST, 'events_end_date', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($events_end_date)) {
        $test_name = filter_var($events_end_date, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["events_end_date"] = "Erreur de format !!";
        } else {
            if (strlen($events_end_date) <= 1 || strlen($events_end_date) >= 200) {
                $error["events_end_date"] = "La longueur n'est pas bonne";
            }
        }
    } else {
        $error["events_end_date"] = "Sélectionner un évènement !!";
    }
    //------------- ID PRODUCT EVENT ---------//
    $id_product = intval(filter_input(INPUT_POST, 'id_product', FILTER_SANITIZE_NUMBER_INT)) ?? 0;
    if (!empty($id_product)) {
        $test_name = filter_var($id_product, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_name) {
            $error["id_product"] = "Erreur de format !!";
        }
    } else {
        $error["id_product"] = "Sélectionner un évènement !!";
    }
    
    //------------- ADD DATA ---------//
    $category = new Event();
    $category->setEventName($events_name);
    $category->setEventDescription($events_description);
    $category->setEventStartDate($events_start_date);
    $category->setEventEndDate($events_end_date);
    $category->setEventProductID($id_product);
    $resultNewCategory = $category->save($events_name, $events_description, $events_start_date, $events_end_date, $id_product);
}





include(__DIR__ . '/../views/templates/header.php');


//!------------- VIEWS ---------//
if ($_SESSION['user']->users_admin == '1') {
        $pageTitle = "Création d'un évènement";
        include(__DIR__ . '/../views/admin/eventsCreate.php');
} else {

    //------------- ADMIN UNAUTHORIZED ---------//
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
include(__DIR__ . '/Footer.php');
