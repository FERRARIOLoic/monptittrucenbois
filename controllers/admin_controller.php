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




//!------------- ADMIN VIEW ---------//

//!------------- USERS NEW ---------//

//!------------- USERS LIST ---------//


//!------------- ORDER NEW ---------//
$ordersNew = Order::getPending(0, 0, 0, 0, 0);

//!------------- ORDER PENDING ---------//
$ordersPending = Order::getPending(0, 1, 0, 0, 0);

$action_order = trim((string) filter_input(INPUT_POST, 'action_order', FILTER_SANITIZE_SPECIAL_CHARS));
$action_event = trim((string) filter_input(INPUT_POST, 'action_event', FILTER_SANITIZE_SPECIAL_CHARS));

//?------------- MODIFY STATUS ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "ordersPending" and $action_order == "made") {

    //------------- NAME CATEGORY ---------//
    $id_order = intval(filter_input(INPUT_POST, 'id_order', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_order)) {
        $test_name = filter_var($id_order, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_name) {
            $error["id_order"] = "Erreur de format !!";
        }
    } else {
        $error["id_order"] = "Sélectionner une commande !!";
    }

    $orderMade = Order::updateStatus($id_order, 1);

    $ordersPending = Order::getPending(0, 1, 0, 0, 0);
}


//!------------- ORDER MADE ---------//

$ordersShip = Order::getShip();

//?------------- MODIFY STATUS ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "ordersPending" and $action_order == "made") {

    //------------- NAME CATEGORY ---------//
    $id_order = intval(filter_input(INPUT_POST, 'id_order', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_order)) {
        $test_name = filter_var($id_order, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_name) {
            $error["id_order"] = "Erreur de format !!";
        }
    } else {
        $error["id_order"] = "Sélectionner une commande !!";
    }

    $orderMade = Order::updateStatus($id_order, 1);
}


//!------------- ORDER SHIP NUMBER ---------//

//?------------- MODIFY STATUS ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "ordersShip" and $action_order == "made") {

    //------------- NAME CATEGORY ---------//
    $id_order = intval(filter_input(INPUT_POST, 'id_order', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_order)) {
        $test_name = filter_var($id_order, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_name) {
            $error["id_order"] = "Erreur de format !!";
        }
    } else {
        $error["id_order"] = "Sélectionner une commande !!";
    }

    $orderMade = Order::updateStatus($id_order, 1);
}


//!------------- ORDER ENDED ---------//

$ordersDelivery = Order::getShip();

//?------------- MODIFY STATUS ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "ordersPending" and $action_order == "made") {

    //------------- NAME CATEGORY ---------//
    $id_order = intval(filter_input(INPUT_POST, 'id_order', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_order)) {
        $test_name = filter_var($id_order, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_name) {
            $error["id_order"] = "Erreur de format !!";
        }
    } else {
        $error["id_order"] = "Sélectionner une commande !!";
    }

    $orderMade = Order::updateStatus($id_order, 1);

    $ordersDelivery = Order::getPending(0, 1, 1);
}

//!------------- ORDER SHIP ---------//


//?------------- MODIFY STATUS ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "ordersShip" and $action_order == "ship_number") {

    //------------- ORDER NUMBER ---------//
    $orders_number = trim((string) filter_input(INPUT_POST, 'orders_number', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($orders_number)) {
        $test_name = filter_var($orders_number, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["orders_number"] = "Erreur de format !!";
        }
    } else {
        $error["orders_number"] = "Sélectionner une commande !!";
    }

    //------------- SHIP NUMBER ---------//
    $orders_ship_number = trim((string) filter_input(INPUT_POST, 'orders_ship_number', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($orders_ship_number)) {
        $test_name = filter_var($orders_ship_number, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$test_name) {
            $error["orders_ship_number"] = "Erreur de format !!";
        }
    } else {
        $error["orders_ship_number"] = "Sélectionner une commande !!";
    }

    $orderMade = Order::saveShip($orders_number,$orders_ship_number);
}


//!------------- ORDERS ENDED ---------//
$ordersEnded = Order::getEnded();



//!------------- EVENT CREATE ---------//

//?------------- ADD NEW EVENT ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "eventsCreate" and $action_event == 'create') {

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
    // var_dump($id_product);die;
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


//!------------- EVENT PENDING ---------//
$eventsPending = Event::getPending();
// var_dump($eventsPending);die;



//!------------- EVENT ENDED ---------//
$eventsEnded = Event::getEnded();
// var_dump($eventsEnded);die;

//!------------- CATEGORY - CREATE / MODIFY ---------//

//?------------- ADD NEW CATEGORY ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "categoryCreateModify" and empty($_POST['id_category'])) {

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
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "categoryCreateModify" and isset($_POST['id_category'])) {

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
}




//!------------- PRODUCTS ---------//

//!------------- PRODUCT MODIFY ---------//

// $ProductsList = Product::getAll();

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

    //------------- TIME ---------//
    $time = intval(filter_input(INPUT_POST, 'time', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($time)) {
        $test_time = filter_var($time, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$test_time) {
            $error["time"] = "Erreur de format !!";
        }
    } else {
        $error["time"] = "Sélectionner un temps de fabrication!!";
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
    $product->setTime($time);
    $resultUpdate = $product->update();
}




//!------------- DATA MODIFY ---------//


//?------------- ADD/MODIFY WOOD ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "woods" and isset($_POST['wood_name'])) {
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


//?------------- ADD/MODIFY CATEGORIES ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "dataModify" and isset($_POST['category_name'])) {
    $id_category = intval(filter_input(INPUT_POST, 'id_category', FILTER_SANITIZE_NUMBER_INT)) ?? 0;

    $action_category = filter_input(INPUT_POST, 'action_category', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';

    $category_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
    if (isset($id_category) and isset($category_name) and $action_category == "modify") {
        $resultCategory = Category::update($id_category, $category_name);
    }
    if (isset($id_category) and isset($category_name) and $action_category == "delete") {
        $resultCategory = Category::delete($id_category);
    }
    if ($id_category == 0 and isset($category_name) and $action_category == "add") {

        //------------- ADD DATA ---------//
        $category = new Category();
        $category->setCategoryName($category_name);
        $resultNewCategory = $category->save();
    }
}

$resultCategory = $resultCategory ?? '';

//?------------- ADD/MODIFY CARRIER ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $admin_view == "carriers" and isset($_POST['carriers_name'])) {

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
    elseif ($admin_view == "usersList") {
        $pageTitle = "Utilisateurs";
        include(__DIR__ . '/../views/admin/usersList.php');
    }

    //------------- ORDER NEW ---------//
    elseif ($admin_view == "ordersNew") {
        $pageTitle = "Commandes en cours";
        include(__DIR__ . '/../views/admin/ordersNew.php');
    }

    //------------- ORDER PENDING ---------//
    elseif ($admin_view == "ordersPending") {
        $pageTitle = "Commandes à fabriquer";
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
        include(__DIR__ . '/../views/admin/productsList.php');
    }

    //------------- PRODUCT MODIFY ---------//
    elseif ($admin_view == "productsModify") {
        $pageTitle = "Modifier un produit";
        include(__DIR__ . '/../views/admin/productsModify.php');
    }

    //------------- CARRIERS ---------//
    elseif ($admin_view == "woods") {
        $pageTitle = "Les essences de bois";
        include(__DIR__ . '/../views/admin/woods.php');
    }

    //------------- CARRIERS ---------//
    elseif ($admin_view == "carriers") {
        $pageTitle = "Les transporteurs";
        include(__DIR__ . '/../views/admin/carriers.php');
    }
} else {

    //------------- ADMIN UNAUTHORIZED ---------//
    include(__DIR__ . '/../views/admin_unauthorized.php');
}
//------------- LINKS ---------//
include(__DIR__ . '/Footer.php');
