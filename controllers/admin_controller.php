<?php
// var_dump($_SERVER['REQUEST_URI']);die;
session_start();

require_once(__DIR__.'/../models/users.php');

$pageTitle = 'Page administrateur';
$admin_view = $_GET['display']??'';


//------------- LINKS ---------//
require_once(__DIR__ . '/header.php');

//------------- DATA ---------//
$users_list = User::getAll();

//------------- VIEWS ---------//
// var_dump($_SESSION['user']);die;
if ($_SESSION['user']->users_admin == '1') {
    if($admin_view==""){
        $pageTitle="Page d'administration";
        include(__DIR__ . '/../views/admin/admin.php');
    }
    elseif($admin_view=="usersNew"){
        $pageTitle = "Nouveaux utilisateurs";
        include(__DIR__ . '/../views/admin/usersNew.php');
    }
    elseif($admin_view=="users"){
        $pageTitle = "Utilisateurs";
        include(__DIR__ . '/../views/admin/users.php');
    }
    elseif($admin_view=="ordersNew"){
        $pageTitle = "Nouvelle commandes";
        include(__DIR__ . '/../views/admin/ordersNew.php');
    }
    elseif($admin_view=="ordersPending"){
        $pageTitle = "Commandes en cours";
        include(__DIR__ . '/../views/admin/ordersPending.php');
    }
    elseif($admin_view=="ordersShip"){
        $pageTitle = "Commandes en attente de livraison";
        include(__DIR__ . '/../views/admin/ordersShip.php');
    }
    elseif($admin_view=="ordersEnded"){
        $pageTitle = "Archive des commandes";
        include(__DIR__ . '/../views/admin/ordersEnded.php');
    }
    elseif($admin_view=="eventsCreate"){
        $pageTitle = "Création d'un évènement";
        include(__DIR__ . '/../views/admin/eventsCreate.php');
    }
    elseif($admin_view=="eventsPending"){
        $pageTitle = "&Eacute;vènements en cours";
        include(__DIR__ . '/../views/admin/eventsPending.php');
    }
    elseif($admin_view=="eventsEnded"){
        $pageTitle = "Evènements terminés";
        include(__DIR__ . '/../views/admin/eventsEnded.php');
    }
    elseif($admin_view=="productsCreate"){
        $pageTitle = "Création d'un produit";
        include(__DIR__ . '/../views/admin/productsCreate.php');
    }
    elseif($admin_view=="products"){
        $pageTitle = "Liste des produits";
        include(__DIR__ . '/../views/admin/products.php');
    }
    elseif($admin_view=="productsModify"){
        $pageTitle = "Modifier un produit";
        include(__DIR__ . '/../views/admin/productsModify.php');
    }
    elseif($admin_view=="dataModify"){
        $pageTitle = "Gérer les informations de base";
        include(__DIR__ . '/../views/admin/dataModify.php');
    }
} else {
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
require_once(__DIR__ . '/footer.php');
