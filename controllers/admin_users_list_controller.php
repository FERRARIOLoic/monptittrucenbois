<?php
session_start();

require_once(__DIR__ . '/../models/Addresses.php');
require_once(__DIR__ . '/../models/Users.php');
require_once(__DIR__ . '/../helpers/modals.php');
require_once(__DIR__ . '/../helpers/regex.php');


$pageTitle = 'Page administrateur';
$admin_view = $_GET['display'] ?? '';

$no_information = "<span class='textUnknown'>Non renseignée</span>";

$action_order = trim((string) filter_input(INPUT_POST, 'action_order', FILTER_SANITIZE_SPECIAL_CHARS));
$action_event = trim((string) filter_input(INPUT_POST, 'action_event', FILTER_SANITIZE_SPECIAL_CHARS));

//------------- DATA ---------//
$users_list = User::getAll();


include(__DIR__ . '/../views/templates/header.php');


//!------------- VIEWS ---------//
if ($_SESSION['user']->users_admin == '1') {
        $pageTitle = "Utilisateurs";
        include(__DIR__ . '/../views/admin/usersList.php');
} else {

    //------------- ADMIN UNAUTHORIZED ---------//
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
include(__DIR__ . '/Footer.php');
