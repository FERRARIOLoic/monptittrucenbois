<?php
// var_dump($_SERVER['REQUEST_URI']);die;
session_start();

require_once(__DIR__ . '/../models/users.php');
require_once(__DIR__ . '/../models/woods.php');
require_once(__DIR__ . '/../models/categories.php');
require_once(__DIR__ . '/../models/carriers.php');

$pageTitle = 'Page administrateur';
$admin_view = $_GET['display'] ?? '';


//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');

//------------- DATA ---------//
$users_list = User::getAll();

//?------------- GET DATA ---------//
$woodList = Wood::getWood();
$categoriesList = Category::getCategory();
$ProductsList = Product::getProduct();




//!------------- ADMIN VIEW ---------//

//!------------- New USERS ---------//

//!------------- Users ---------//

//!------------- ORDER NEW ---------//

//!------------- ORDER PENDING ---------//

//!------------- ORDER SHIP ---------//

//!------------- ORDER ENDED ---------//

//!------------- EVENT CREATE ---------//

//!------------- EVENT PENDING ---------//

//!------------- EVENT ENDED ---------//

//!------------- CATEGORY - CREATE / MODIFY ---------//

//?------------- ADD NEW CATEGORY ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "categoryCreateModify" and empty($_POST['id_category'])) {
    $category_info = Category::getCategory($id_category);
    // var_dump($category_info);die;
    
        //------------- ADD DATA ---------//
        $category = new Category();
        $category->setCategoryName($category_name);
        $category->setText1($text1);
        $category->setText2($text2);
        $category->setText3($text3);
        $category->setText4($text4);
        $resultNewCategory = $category->save();
}

//?------------- UPDATE CATEGORY ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view =="categoryCreateModify" and isset($_POST['id_category'])) {
    
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

    $category_info = Category::getCategory($id_category);
    

    //------------- NAME CATEGORY ---------//
    $category_name = filter_input(INPUT_POST, 'categories', FILTER_SANITIZE_SPECIAL_CHARS)??$category_info->categories;
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
    // var_dump($category_name);die;

    //------------- TEXT 1 ---------//
    $text1 = filter_input(INPUT_POST, 'text1', FILTER_SANITIZE_SPECIAL_CHARS)??$category_info->text1;
    if (!empty($text1)) {
        $test_name = filter_var($text1, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["text1"] = "Erreur de format !!";
        } else {
            if (strlen($text1) <= 1 || strlen($text1) >= 70) {
                $error["text1"] = "La longueur du texte n'est pas bonne";
            }
        }
    } else {
        $error["text1"] = "Sélectionner un texte !!";
    }

    //------------- TEXT 2 ---------//
    $text2 = filter_input(INPUT_POST, 'text2', FILTER_SANITIZE_SPECIAL_CHARS)??$category_info->text2;
    if (!empty($text2)) {
        $test_name = filter_var($text2, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["text2"] = "Erreur de format !!";
        } else {
            if (strlen($text2) <= 1 || strlen($text2) >= 70) {
                $error["text2"] = "La longueur du texte n'est pas bonne";
            }
        }
    } else {
        $error["text2"] = "Sélectionner un texte !!";
    }

    //------------- TEXT 3 ---------//
    $text3 = filter_input(INPUT_POST, 'text3', FILTER_SANITIZE_SPECIAL_CHARS)??$category_info->text3;
    if (!empty($text3)) {
        $test_name = filter_var($text3, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["text3"] = "Erreur de format !!";
        } else {
            if (strlen($text3) <= 1 || strlen($text3) >= 70) {
                $error["text3"] = "La longueur du texte n'est pas bonne";
            }
        }
    } else {
        $error["text3"] = "Sélectionner un texte !!";
    }

    //------------- TEXT 4 ---------//
    $text4 = filter_input(INPUT_POST, 'text4', FILTER_SANITIZE_SPECIAL_CHARS)??$category_info->text4;
    if (!empty($text4)) {
        $test_name = filter_var($text4, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["text4"] = "Erreur de format !!";
        } else {
            if (strlen($text4) <= 1 || strlen($text4) >= 70) {
                $error["text4"] = "La longueur du texte n'est pas bonne";
            }
        }
    } else {
        $error["text4"] = "Sélectionner un texte !!";
    }
    
        //------------- ADD DATA ---------//
        $category = new Category();
        $category->setID($id_category);
        $category->setCategoryName($category_name);
        $category->setText1($text1);
        $category->setText2($text2);
        $category->setText3($text3);
        $category->setText4($text4);
        $resultUpdateCategory = $category->update();
        // var_dump($id_category);die;
}


//!------------- PRODUCT - CREATE ---------//

$productsListCategories = Category::getAll();

//?------------- ADD PRODUCT ---------//

if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "productsCreate" and empty($_POST['id_product'])) {

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
    // var_dump($resultCreate);
    // die;
}




//!------------- PRODUCTS ---------//

//!------------- PRODUCT MODIFY ---------//

$ProductsList = Product::getAll();

//?------------ GET PRODUCT INFO AND REDIRECT ---------//

if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "productsCreate" and isset($_POST['id_product'])) {
    $id_product = intval(filter_input(INPUT_POST, 'id_product', FILTER_SANITIZE_NUMBER_INT));

    $ProductInfo = Product::getProduct($id_product);
    $categoryInfo = (Category::getCategory($ProductInfo->id_category))->id_category;
    $woodInfo = (Wood::getWood($ProductInfo->id_wood))->id_wood;
}


//?------------- UPDATE PRODUCT INFO ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "productsModify" and isset($_POST['id_product'])) {
    $id_product = intval(filter_input(INPUT_POST, 'id_product', FILTER_SANITIZE_NUMBER_INT));

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
    $product->setId($id_product);
    $product->setIdCategory($id_category);
    $product->setProductName($product_name);
    $product->setIdWood($id_wood);
    $product->setDescription($description);
    $product->setWeight($weight);
    $product->setPrice($price);
    $resultUpdate = $product->update();
    // var_dump($resultUpdate);
    // die;
}




//!------------- DATA MODIFY ---------//


//?------------- ADD/MODIFY WOOD ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "dataModify" and isset($_POST['wood_name'])) {
    $id_wood = intval(filter_input(INPUT_POST, 'id_wood', FILTER_SANITIZE_NUMBER_INT)) ?? 0;
    // var_dump($_POST['id_wood']);die;

    $action_wood = filter_input(INPUT_POST, 'action_wood', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
    // var_dump($action_wood);die;

    $wood_name = filter_input(INPUT_POST, 'wood_name', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
    // var_dump($wood_name);die;
    if (isset($id_wood) and isset($wood_name) and $action_wood == "modify") {
        $resultWood = Wood::update($id_wood, $wood_name);
        // var_dump('delete');die;
    }
    if (isset($id_wood) and isset($wood_name) and $action_wood == "delete") {
        $resultWood = Wood::delete($id_wood);
        // var_dump($resultWood);die;
    }
    if ($id_wood == 0 and isset($wood_name) and $action_wood == "add") {
        // var_dump($wood_name);die;
        $resultWood = Wood::save($wood_name);
    }
    // unset($id_wood);
    // unset($wood_name);
}

$resultWood = $resultWood ?? '';


//?------------- ADD/MODIFY CATEGORIES ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "dataModify" and isset($_POST['category_name'])) {
    $id_category = intval(filter_input(INPUT_POST, 'id_category', FILTER_SANITIZE_NUMBER_INT)) ?? 0;
    // var_dump($_POST['id_category']);die;

    $action_category = filter_input(INPUT_POST, 'action_category', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
    // var_dump($action_category);die;

    $category_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
    $text1 = filter_input(INPUT_POST, 'text1', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
    $text2 = filter_input(INPUT_POST, 'text2', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
    $text3 = filter_input(INPUT_POST, 'text3', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
    $text4 = filter_input(INPUT_POST, 'text4', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
    // var_dump($category_name);die;
    if (isset($id_category) and isset($category_name) and $action_category == "modify") {
        $resultCategory = Category::update($id_category, $category_name);
        // var_dump('delete');die;
    }
    if (isset($id_category) and isset($category_name) and $action_category == "delete") {
        $resultCategory = Category::delete($id_category);
        // var_dump($resultCategory);die;
    }
    if ($id_category == 0 and isset($category_name) and $action_category == "add") {
        // var_dump($category_name);die;

        //------------- ADD DATA ---------//
        $category = new Category();
        $category->setCategoryName($category_name);
        $category->setText1($text1);
        $category->setText2($text2);
        $category->setText3($text3);
        $category->setText4($text4);
        $resultNewCategory = $category->save();
    }
    // unset($id_category);
    // unset($category_name);
}

$resultCategory = $resultCategory ?? '';

//?------------- ADD/MODIFY CARRIER ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "dataModify" and isset($_POST['carriers_name'])) {
    $id_carrier = intval(filter_input(INPUT_POST, 'id_carrier', FILTER_SANITIZE_NUMBER_INT)) ?? 0;
    // var_dump($_POST['id_carrier']);die;
    $carriers_name = filter_input(INPUT_POST, 'carriers_name', FILTER_SANITIZE_SPECIAL_CHARS);
    // var_dump($_POST['carriers_name']);die;
    $carriers_number = filter_input(INPUT_POST, 'carriers_number', FILTER_SANITIZE_SPECIAL_CHARS);
    // var_dump($_POST['carriers_number']);die;
    $carriers_email = filter_input(INPUT_POST, 'carriers_email', FILTER_SANITIZE_SPECIAL_CHARS);
    // var_dump($_POST['carriers_email']);die;
    if (isset($id_carrier) and isset($carriers_name)) {
        $resultCarrier = Carrier::update($id_carrier, $carriers_name);
    }
    if ($id_carrier == 0 and (isset($carriers_name) or isset($carriers_number) or isset($carriers_email))) {
        // var_dump($carriers_name);die;
        $resultCarrier = Carrier::save($carriers_name, $carriers_number, $carriers_email);
    }
    unset($_POST['id_carrier']);
    unset($_POST['carriers_name']);
    unset($_POST['carriers_number']);
    unset($_POST['carriers_email']);
}
$resultCarrier = $resultCarrier ?? '';










//!------------- VIEWS ---------//
// var_dump($_SESSION['user']);die;
if ($_SESSION['user']->users_admin == '1') {

    //------------- ADMIN VIEW ---------//
    if ($admin_view == "") {
        $pageTitle = "Page d'administration";
        include(__DIR__ . '/../views/admin/admin.php');
    }

    //------------- New USERS ---------//
    elseif ($admin_view == "usersNew") {
        $pageTitle = "Nouveaux utilisateurs";
        include(__DIR__ . '/../views/admin/usersNew.php');
    }

    //------------- Users ---------//
    elseif ($admin_view == "users") {
        $pageTitle = "Utilisateurs";
        include(__DIR__ . '/../views/admin/users.php');
    }

    //------------- ORDER NEW ---------//
    elseif ($admin_view == "ordersNew") {
        $pageTitle = "Nouvelle commandes";
        include(__DIR__ . '/../views/admin/ordersNew.php');
    }

    //------------- ORDER PENDING ---------//
    elseif ($admin_view == "ordersPending") {
        $pageTitle = "Commandes en cours";
        include(__DIR__ . '/../views/admin/ordersPending.php');
    }

    //------------- ORDER SHIP ---------//
    elseif ($admin_view == "ordersShip") {
        $pageTitle = "Commandes en attente de livraison";
        include(__DIR__ . '/../views/admin/ordersShip.php');
    }

    //------------- ORDER ENDED ---------//
    elseif ($admin_view == "ordersEnded") {
        $pageTitle = "Archive des commandes";
        include(__DIR__ . '/../views/admin/ordersEnded.php');
    }

    //------------- EVENT CREATE ---------//
    elseif ($admin_view == "eventsCreate") {
        $pageTitle = "Création d'un évènement";
        include(__DIR__ . '/../views/admin/eventsCreate.php');
    }

    //------------- EVENT PENDING ---------//
    elseif ($admin_view == "eventsPending") {
        $pageTitle = "&Eacute;vènements en cours";
        include(__DIR__ . '/../views/admin/eventsPending.php');
    }

    //------------- EVENT ENDED ---------//
    elseif ($admin_view == "eventsEnded") {
        $pageTitle = "Evènements terminés";
        include(__DIR__ . '/../views/admin/eventsEnded.php');
    }

    //------------- CATEGORY CREATE MODIFY ---------//
    elseif ($admin_view == "categoryCreateModify") {
        $pageTitle = "Gestion des catégories";
        include(__DIR__ . '/../views/admin/categoryCreateModify.php');
    }
    //------------- PRODUCT CREATE ---------//
    elseif ($admin_view == "productsCreate") {
        $pageTitle = "Création d'un produit";
        include(__DIR__ . '/../views/admin/productsCreate.php');
    }

    //------------- PRODUCTS ---------//
    elseif ($admin_view == "products") {
        $pageTitle = "Liste des produits";
        include(__DIR__ . '/../views/admin/products.php');
    }

    //------------- PRODUCT MODIFY ---------//
    elseif ($admin_view == "productsModify") {
        $pageTitle = "Modifier un produit";
        include(__DIR__ . '/../views/admin/productsModify.php');
    }

    //------------- DATA MODIFY ---------//
    elseif ($admin_view == "dataModify") {
        $pageTitle = "Gérer les informations de base";
        include(__DIR__ . '/../views/admin/dataModify.php');
    }
} else {

    //------------- ADMIN UNAUTHORIZED ---------//
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');
