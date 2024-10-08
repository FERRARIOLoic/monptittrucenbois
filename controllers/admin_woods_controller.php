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



//!------------- DATA MODIFY ---------//


//?------------- ADD/MODIFY WOOD ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['wood_name'])) {
    $id_wood = intval(filter_input(INPUT_POST, 'id_wood', FILTER_SANITIZE_NUMBER_INT)) ?? 0;

    $action_wood = filter_input(INPUT_POST, 'action_wood', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';

    $wood_name = filter_input(INPUT_POST, 'wood_name', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
    if (isset($id_wood) and isset($wood_name) and $action_wood == "modify") {
        $resultWood = Wood::update($id_wood, $wood_name);
    }
    if (isset($id_wood) and isset($wood_name) and $action_wood == "delete") {
        $resultWood = Wood::delete($id_wood);
    }
    if ($id_wood == 0 and isset($wood_name) and $action_wood == "add") {
        $resultWood = Wood::save($wood_name);
    }
}

$resultWood = $resultWood ?? '';




include(__DIR__ . '/../views/templates/header.php');


//!------------- VIEWS ---------//
if ($_SESSION['user']->users_admin == '1') {
        $pageTitle = "Les essences de bois";
        include(__DIR__ . '/../views/admin/woods.php');
} else {

    //------------- ADMIN UNAUTHORIZED ---------//
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
include(__DIR__ . '/Footer.php');
