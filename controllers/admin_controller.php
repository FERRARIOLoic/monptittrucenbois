<?php
session_start();

require_once(__DIR__ . '/../helpers/modals.php');
require_once(__DIR__ . '/../helpers/regex.php');


include(__DIR__ . '/../views/templates/header.php');


//!------------- VIEWS ---------//
if ($_SESSION['user']->users_admin == '1') {

    $pageTitle = "Page administrateur";
    include(__DIR__ . '/../views/admin/admin.php');
} else {

    //------------- ADMIN UNAUTHORIZED ---------//
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
include(__DIR__ . '/Footer.php');
