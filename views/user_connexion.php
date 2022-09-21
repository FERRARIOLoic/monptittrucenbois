<?php

require_once(__DIR__.'/../models/errors.php');
require_once(__DIR__.'/../models/users.php');

$pageTitle = 'Profil utilisateur';

require_once(__DIR__ . '/../models/users.php');
$user_id = intval(filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT));
$error = intval(filter_input(INPUT_GET, 'error', FILTER_SANITIZE_NUMBER_INT));

$user_info = User::getAll($user_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //------------- CATEGORY ---------//
    $category = trim(filter_input(INPUT_GET, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    if (!empty($category)) {
        $testCategory = filter_var($category, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$testCategory) {
            $error["category"] = "Le type de client n'est pas au bon format !!";
        }
    } else {
        $error["category"] = "Vous devez sélectionner un type !!";
    }

    //------------- GENDER ---------//
    $gender = trim(filter_input(INPUT_GET, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    if (!empty($gender)) {
        $testGender = filter_var($gender, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_NAME)));
        if (!$testGender) {
            $error["gender"] = "Le genre n'est pas au bon format !!";
        }
    } else {
        $error["gender"] = "Vous devez sélectionner un genre !!";
    }

    //------------- LASTNAME ---------//
    $lastname = trim(filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
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
    $firstname = trim(filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
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
    $birthdate = filter_input(INPUT_GET, 'birthdate', FILTER_SANITIZE_NUMBER_INT);
    if (!empty($birthdate)) {
        $testBirthdate = filter_var($birthdate, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_DATE)));
        if (!$testBirthdate) {
            $error["birthdate"] = "La date n'est pas au bon format!!";
        }
    } else {
        $error["birthdate"] = "Vous devez entrer une date !!";
    }

    //------------- PHONE ---------//
    $phone = filter_input(INPUT_GET, 'phone', FILTER_SANITIZE_NUMBER_INT);
    if (!empty($phone)) {
        $testPhone = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => REGEX_PHONE)));
        if (!$testPhone) {
            $error["phone"] = "Le numéro de téléphone n'est pas au bon format!!";
        }
    } else {
        $error["phone"] = "Vous devez entrer un numéro de téléphone !!";
    }

    //------------- MAIL ---------//
    $mail = trim(filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL));
    if (!empty($mail)) {
        $testEmail = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if (!$testEmail) {
            $error["mail"] = "L'adresse email n'est pas au bon format !!";
        }
    } else {
        $error["mail"] = "L'adresse mail est obligatoire !!";
    }

    //------------- ADD DATA ---------//
    $patientNew = new User();
    $patientNew->setID($patient_id);
    $patientNew->setCategory($category);
    $patientNew->setGender($gender);
    $patientNew->setLastname($lastname);
    $patientNew->setFirstname($firstname);
    $patientNew->setBirthdate($birthdate);
    $patientNew->setPhone($phone);
    $patientNew->setEmail($mail);



    $checkedEmail = $patient->checkEmail($mail);
    if ($checkedEmail == true) {
        $resultView = "Erreur, l'adresse mail existe déjà";
    } else {
        $resultUpdate = $patient->update();
        if ($resultUpdate == true) {

            $payload = array('email' => $mail, 'expire' => time() + 3600);
            $jwt = JWT::generate($payload);
            $subject = "Validation de l'inscription";
            $message = 'Merci de valider votre compte en cliquant sur <a href="' . $_SERVER['HTTP_ORIGIN'] . '/controllers/validate_user_add_controller.php?token=' . $jwt . '">ce lien</a>';
            mail($mail, $subject, $message);
            $resultView = "Modifications enregistrées";
        } else {
            $resultView = "Erreur lors de l'enregistrement des données";
        }
    }
}
//------------- LINKS ---------//
require_once(__DIR__ . '/templates/header.php');

//------------- VIEWS ---------//
if (isset($_SESSION['firstname'])) {
    include(__DIR__ . '/../views/userProfile.php');
} else {

    $errorText = ErrorText::getByID($error);
    // var_dump($errorText); die;
    include(__DIR__ . '/../views/user_connexion.php');
}

//------------- LINKS ---------//
require_once(__DIR__ . '/footer.php');
