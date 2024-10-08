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




$resultWood = $resultWood ?? '';


//?------------- ADD/MODIFY CARRIER ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['carriers_name'])) {

    // GET THE ID_CARRIER FORM UPDATE OR CREATE
    $id_carrier = intval(filter_input(INPUT_POST, 'id_carrier', FILTER_SANITIZE_NUMBER_INT)) ?? 0;

    $carriers_name = filter_input(INPUT_POST, 'carriers_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $carriers_phone = filter_input(INPUT_POST, 'carriers_phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $carriers_email = filter_input(INPUT_POST, 'carriers_email', FILTER_SANITIZE_SPECIAL_CHARS);
    $carriers_ship_follow = filter_input(INPUT_POST, 'carriers_ship_follow', FILTER_SANITIZE_SPECIAL_CHARS);

    if (isset($id_carrier) and isset($carriers_name)) {
        $resultCarrier = Carrier::update($id_carrier, $carriers_name, $carriers_phone, $carriers_email, $carriers_ship_follow);
    }
    if ($id_carrier == 0 and (isset($carriers_name) or isset($carriers_phone) or isset($carriers_email))) {
        $resultCarrier = Carrier::save($carriers_name, $carriers_phone, $carriers_email, $carriers_ship_follow);
    }
    unset($_POST['id_carrier'], $_POST['carriers_name'], $_POST['carriers_phone'], $_POST['carriers_email']);
}
$resultCarrier = $resultCarrier ?? '';








include(__DIR__ . '/../views/templates/header.php');


//!------------- VIEWS ---------//
if ($_SESSION['user']->users_admin == '1') {
    $pageTitle = "Les transporteurs";
    include(__DIR__ . '/../views/admin/carriers.php');
} else {

    //------------- ADMIN UNAUTHORIZED ---------//
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
include(__DIR__ . '/Footer.php');
