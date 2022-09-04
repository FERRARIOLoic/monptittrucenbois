<?php

$pageTitle = 'Page administrateur';
$admin_view = $_GET['display']??'';


//------------- LINKS ---------//
require_once(__DIR__ . '/linksHeader.php');

//------------- DATA ---------//
require_once(__DIR__ . '/../models/data.php');

//------------- VIEWS ---------//
// var_dump($admin_view);
// die;
if ($_SESSION['users_status'] == '0') {
    if($admin_view==""){
        $pageTitle="Page d'administration";
        include(__DIR__ . '/../views/admin.php');
    }
    elseif($admin_view=="usersNew"){
        $pageTitle = "Nouveaux utilisateurs";
        include(__DIR__ . '/../views/templates/usersNew.php');
    }
    elseif($admin_view=="users"){
        $pageTitle = "Utilisateurs";
        include(__DIR__ . '/../views/templates/users.php');
    }
    elseif($admin_view=="ordersNew"){
        $pageTitle = "Nouvelle commandes";
        include(__DIR__ . '/../views/templates/ordersNew.php');
    }
    elseif($admin_view=="ordersPending"){
        $pageTitle = "Commandes en cours";
        include(__DIR__ . '/../views/templates/ordersPending.php');
    }
    elseif($admin_view=="ordersShip"){
        $pageTitle = "Commandes en attente de livraison";
        include(__DIR__ . '/../views/templates/ordersShip.php');
    }
    elseif($admin_view=="ordersEnded"){
        $pageTitle = "Archive des commandes";
        include(__DIR__ . '/../views/templates/ordersEnded.php');
    }
    elseif($admin_view=="eventsCreate"){
        $pageTitle = "Création d'un évènement";
        include(__DIR__ . '/../views/templates/eventsCreate.php');
    }
    elseif($admin_view=="eventsPending"){
        $pageTitle = "&Eacute;vènements en cours";
        include(__DIR__ . '/../views/templates/eventsPending.php');
    }
    elseif($admin_view=="eventsEnded"){
        $pageTitle = "Evènements terminés";
        include(__DIR__ . '/../views/templates/eventsEnded.php');
    }
    elseif($admin_view=="productsCreate"){
        $pageTitle = "Création d'un produit";
        include(__DIR__ . '/../views/templates/productsCreate.php');
    }
    elseif($admin_view=="products"){
        $pageTitle = "Liste des produits";
        include(__DIR__ . '/../views/templates/products.php');
    }
    elseif($admin_view=="productsModify"){
        $pageTitle = "Modifier un produit";
        include(__DIR__ . '/../views/templates/productsModify.php');
    }
    elseif($admin_view=="dataModify"){
        $pageTitle = "Gérer les informations de base";
        include(__DIR__ . '/../views/templates/dataModify.php');
    }
} else {
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
require_once(__DIR__ . '/linksFooter.php');
