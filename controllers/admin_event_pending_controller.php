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

//!------------- EVENT PENDING ---------//
$eventsPending = Event::getPending();






include(__DIR__ . '/../views/templates/header.php');


//!------------- VIEWS ---------//
if ($_SESSION['user']->users_admin == '1') {
        $pageTitle = "&Eacute;vènements en cours";
        include(__DIR__ . '/../views/admin/eventsPending.php');
} else {

    //------------- ADMIN UNAUTHORIZED ---------//
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
include(__DIR__ . '/Footer.php');
