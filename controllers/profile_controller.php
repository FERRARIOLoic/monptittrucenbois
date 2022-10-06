<?php
session_start();
//------------- REGEX ---------//
require_once(__DIR__ . '/../helpers/regex.php');

require_once(__DIR__ . '/../models/Errors.php');
require_once(__DIR__ . '/../models/Users.php');
require_once(__DIR__ . '/../models/Addresses.php');
require_once(__DIR__ . '/../models/Orders.php');
require_once(__DIR__ . '/../models/Carriers.php');
require_once(__DIR__ . '/../models/Products.php');

$pageTitle = 'Profil utilisateur';

// $error = intval(filter_input(INPUT_GET, 'error', FILTER_SANITIZE_NUMBER_INT));

$user_info = User::getAll($_SESSION['user']->user_id);
$address_first = Address::getAddressInfo($_SESSION['user']->user_id, 1);
$address_others = Address::getAddressInfo($_SESSION['user']->user_id);

//!------------- REQUESTS INFOS ---------//

//?------------- ALL ORDERS ---------//
$orders_all = Order::getPending($_SESSION['user']->user_id);

//?------------- ORDERS PENDING ---------//
$orders_pending = Order::getPending($_SESSION['user']->user_id, 0, 0, 0, 0);

//?------------- ORDERS PAYED ---------//
$orders_payed = Order::getPending($_SESSION['user']->user_id, 1, 0, 0, 0);

//?------------- ORDERS MADE ---------//
$orders_made = Order::getPending($_SESSION['user']->user_id, 1, 1, 0, 0);
// var_dump($orders_all);die;

//?------------- ORDERS SHIPPED ---------//
$orders_shipped = Order::getPending($_SESSION['user']->user_id, 1, 1, 1, 0);

//?------------- ORDERS DELIVERED ---------//
$orders_delivered = Order::getPending($_SESSION['user']->user_id, 1, 1, 1, 1);

//?------------- GET CARRIERS ---------//
$carriers_list = Carrier::getCarrier();


$action_profile = filter_input(INPUT_POST, 'action_profile', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


//!------------- ORDER PRODUCT DELETE ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $action_profile == 'delete') {

    //------------- ID ORDER ---------//
    $id_order = intval(filter_input(INPUT_POST, 'id_order', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_order)) {
        $testid_order = filter_var($id_order, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$testid_order) {
            $error["id_order"] = "Le code de commande n'est pas au bon format !!";
        }
    } else {
        $error["id_order"] = "Vous devez sélectionner une ligne de commande !!";
    }


    //------------- ADD DATA ---------//
    $resultDelete = Order::delete($_SESSION['user']->user_id, $id_order);
    // var_dump($resultDelete);die;
    if ($resultDelete == true) {

        $resultView = "Modifications enregistrées";
    } else {
        $resultView = "Erreur lors de l'enregistrement des données";
    }

    $orders_pending = Order::getPending($_SESSION['user']->user_id);
}

//!------------- ORDER QUANTITY MODIFY ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $action_profile == 'modify') {

    //------------- ID ORDER ---------//
    $id_order = intval(filter_input(INPUT_POST, 'id_order', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_order)) {
        $testid_order = filter_var($id_order, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$testid_order) {
            $error["id_order"] = "Le code de commande n'est pas au bon format !!";
        }
    } else {
        $error["id_order"] = "Vous devez sélectionner une ligne de commande !!";
    }

    //------------- ORDER QUANTITY ---------//
    $quantity = intval(filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($quantity)) {
        $testid_order = filter_var($quantity, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$testid_order) {
            $error["quantity"] = "Le a quantité est incorrecte !!";
        }
    } else {
        $error["quantity"] = "Vous devez sélectionner une quantité !!";
    }

    //------------- ADD DATA ---------//
    $resultUpdate = Order::updateQuantity($_SESSION['user']->user_id, $id_order, $quantity);
    // var_dump($resultUpdate);die;
    if ($resultUpdate == true) {

        $resultView = "Modifications enregistrées";
    } else {
        $resultView = "Erreur lors de l'enregistrement des données";
    }

    $orders_pending = Order::getPending($_SESSION['user']->user_id);
}



//!------------- CARRIER CHOICE MODIFY ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $action_profile == 'carrier_choice') {

    //------------- ID ORDER ---------//
    $id_order = intval(filter_input(INPUT_POST, 'id_order', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_order)) {
        $testid_order = filter_var($id_order, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$testid_order) {
            $error["id_order"] = "Le code de commande n'est pas au bon format !!";
        }
    } else {
        $error["id_order"] = "Vous devez sélectionner une ligne de commande !!";
    }

    //------------- ORDER CARRIER ---------//
    $id_carrier = intval(filter_input(INPUT_POST, 'id_carrier', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($id_carrier)) {
        $testid_order = filter_var($id_carrier, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$testid_order) {
            $error["id_carrier"] = "Le a quantité est incorrecte !!";
        }
    } else {
        $error["id_carrier"] = "Vous devez sélectionner une quantité !!";
    }

    //------------- ORDER WEIGHT ---------//
    $order_weight = intval(filter_input(INPUT_POST, 'order_weight', FILTER_SANITIZE_NUMBER_INT));
    // var_dump($order_weight);die;
    if (!empty($order_weight)) {
        $testid_order = filter_var($order_weight, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$testid_order) {
            $error["order_weight"] = "Le a quantité est incorrecte !!";
        }
    } else {
        $error["order_weight"] = "Vous devez sélectionner une quantité !!";
    }

    //------------- ADD DATA ---------//
    $resultUpdate = Order::updateCarrier($_SESSION['user']->user_id, $id_carrier, $order_weight);
    // var_dump($resultUpdate);die;
    if ($resultUpdate == true) {

        $resultView = "Modifications enregistrées";
    } else {
        $resultView = "Erreur lors de l'enregistrement des données";
    }

    $orders_pending = Order::getPending($_SESSION['user']->user_id);
    $carriers_price = Carrier::getPrice($id_carrier, $order_weight);
    // var_dump($carriers_price);die;
}

//!------------- ORDER VALIDATE ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $action_profile == 'order_validate') {

    //------------- ID ORDER ---------//
    $orders_number = trim((string) filter_input(INPUT_POST, 'orders_number', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($orders_number)) {
        $testorders_number = filter_var($orders_number, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_INT)));
        if (!$testorders_number) {
            $error["orders_number"] = "Le code de commande n'est pas au bon format !!";
        }
    } else {
        $error["orders_number"] = "Vous devez sélectionner une ligne de commande !!";
    }

    //------------- ADD DATA ---------//
    $resultUpdate = Order::validate($_SESSION['user']->user_id, $orders_number);
    $orders_pending = Order::getPending($_SESSION['user']->user_id);
    // var_dump($resultUpdate);die;
}


//!------------- ORDER RECEIVED ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' AND $action_profile == 'ship_received') {

    //------------- ID ORDER ---------//
    $orders_number = trim((string) filter_input(INPUT_POST, 'orders_number', FILTER_SANITIZE_SPECIAL_CHARS));
    // var_dump($orders_number);die;
    if (!empty($orders_number)) {
        $testorders_number = filter_var($orders_number, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$testorders_number) {
            $error["orders_number"] = "Le code de commande n'est pas au bon format !!";
        }
    } else {
        $error["orders_number"] = "Vous devez sélectionner une ligne de commande !!";
    }
    //------------- ADD DATA ---------//
    $shipReceived = Order::shipReceived($orders_number);
    $orders_shipped = Order::getPending($_SESSION['user']->user_id, 1, 1, 1, 0);
    unset($orders_number);

}

//!------------- PROFILE INFO ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $action_profile == 'profile_info') {

    //------------- CATEGORY ---------//
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // var_dump($category);die;
    if (!empty($category)) {
        $testCategory = filter_var($category, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$testCategory) {
            $error['category'] = "Le type de client n'est pas au bon format !!";
        }
    } else {
        $error["category"] = "Vous devez sélectionner un type !!";
    }

    //------------- GENDER ---------//
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
    if (!empty($gender)) {
        $testGender = filter_var($gender, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$testGender) {
            $error["gender"] = "Le genre n'est pas au bon format !!";
        }
    } else {
        $error["gender"] = "Vous devez sélectionner un genre !!";
    }

    //------------- LASTNAME ---------//
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
    if (!empty($lastname)) {
        $testLastname = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$testLastname) {
            $error["lastname"] = "Le nom n'est pas au bon format !!";
        } else {
            if (strlen($lastname) <= 1 || strlen($lastname) >= 70) {
                $error["lastname"] = "La longueur du nom n'est pas bon";
            }
        }
    } else {
        $error["lastname"] = "Vous devez entrer un nom!!";
    }

    //------------- FIRSTNAME ---------//
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($firstname)) {
        $testFirstname = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$testFirstname) {
            $error["firstname"] = "Le nom n'est pas au bon format!!";
        } else {
            if (strlen($firstname) <= 1 || strlen($firstname) >= 70) {
                $error["firstname"] = "La longueur du prénom n'est pas bon";
            }
        }
    } else {
        $error["firstname"] = "Vous devez entrer un prénom !!";
    }

    //------------- BIRTHDATE ---------//
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);
    // var_dump($birthdate);die;
    if (!empty($birthdate)) {
        $testBirthdate = filter_var($birthdate, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_DATE)));
        if (!$testBirthdate) {
            $error["birthdate"] = "La date n'est pas au bon format!!";
        }
    } else {
        $error["birthdate"] = "Vous devez entrer une date !!";
    }

    //------------- PHONE ---------//
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($phone)) {
        $testPhone = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_PHONE)));
        if (!$testPhone) {
            $error["phone"] = "Le numéro de téléphone n'est pas au bon format!!";
        }
    } else {
        $error["phone"] = "Vous devez entrer un numéro de téléphone !!";
    }

    //------------- MAIL ---------//
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    // var_dump($email);die;
    if (!empty($email)) {
        $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$testEmail) {
            $error["email"] = "L'adresse email n'est pas au bon format !!";
        }
    } else {
        $error["email"] = "L'adresse email est obligatoire !!";
    }

    //------------- ADD DATA ---------//
    $User = new User();
    $User->setID($_SESSION['user']->user_id);
    $User->setCategory($category);
    $User->setGender($gender);
    $User->setLastname($lastname);
    $User->setFirstname($firstname);
    $User->setBirthdate($birthdate);
    $User->setPhone($phone);
    $User->setEmail($email);

    $resultUpdate = $User->update();
    // var_dump($resultUpdate);die;
    if ($resultUpdate == true) {

        $resultView = "Modifications enregistrées";
    } else {
        $resultView = "Erreur lors de l'enregistrement des données";
    }
}


//!------------- ADRESS ---------//
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $action_profile == 'address') {

    //------------- ADRESS ---------//
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($address)) {
        $testPhone = filter_var($address, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$testPhone) {
            $error["address"] = "L'adresse n'est pas au bon format!!";
        }
    } else {
        $error["address"] = "Vous devez entrer une adresse !!";
    }


    //------------- ADDRESS MORE ---------//
    $address_more = filter_input(INPUT_POST, 'address_more', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';



    //------------- POSTAL CODE ---------//
    $postal_code = filter_input(INPUT_POST, 'postal_code', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($postal_code)) {
        $testPhone = filter_var($postal_code, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$testPhone) {
            $error["postal_code"] = "Le code postal n'est pas au bon format!!";
        }
    } else {
        $error["postal_code"] = "Vous devez entrer un code postal !!";
    }


    //------------- CITY ---------//
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($city)) {
        $testPhone = filter_var($city, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$testPhone) {
            $error["city"] = "La ville n'est pas au bon format!!";
        }
    } else {
        $error["city"] = "Vous devez entrer une ville !!";
    }

    //------------- ADD DATA ---------//
    $User = new Address();
    $User->setID($_SESSION['user']->user_id);
    $User->setUserId($_SESSION['user']->user_id);
    $User->setAddress($address);
    $User->setAddressMore($address_more);
    $User->setPostalCode($postal_code);
    $User->setCity($city);

    $resultUpdate = $User->update();
    // var_dump($resultUpdate);die;
    if ($resultUpdate == true) {

        $resultView = "Modifications enregistrées";
    } else {
        $resultView = "Erreur lors de l'enregistrement des données";
    }
}



//------------- LINKS ---------//
require_once(__DIR__ . '/Header.php');
require_once(__DIR__ . '/../views/templates/navbar.php');

//------------- VIEWS ---------//
// if (isset($_SESSION['validated'])) {
include(__DIR__ . '/../views/profile.php');
// } else {

//     $errorText = ErrorText::getByID($error);
//     include(__DIR__ . '/../views/user_connexion.php');
// }

//------------- LINKS ---------//
require_once(__DIR__ . '/Footer.php');
