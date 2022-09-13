<?php

require_once(__DIR__ . '/../models/users.php');

$pdo = Database::DBconnect();

//------------- MAIL ---------//
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
if (!empty($email)) {
    $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$testEmail) {
        $error["email"] = "L'adresse email n'est pas au bon format !!";
    }
    if (User::checkEmail($email) == 1) {
        $error = 3;
    } elseif (User::checkEmail($email) == 2) {
        $error = 2;
    }
} else {
    $error = 1;
}
//------------- PASSWORD ---------//
$password = filter_input(INPUT_POST, 'password');
if (empty($password)) {
    $error["password"] = "Le mot de passe est obligatoire !!";
}
//------------- PASSWORD VERIF ---------//
$password_verif = filter_input(INPUT_POST, 'password_verif');
if (empty($password_verif)) {
    $error["password_verif"] = "Le mot de passe est obligatoire !!";
}

if ($password !== $password_verif) {
    $error['password_verif'] = "Les mots de passe ne correspondent pas";
} else {
    $password = password_hash($password, PASSWORD_DEFAULT);
}
//------------- VERIF ERROR ---------//
if (empty($error)) {
    //------------- ADD DATA ---------//
    $patient = new User();
    $patient->setEmail($email);
    $patient->setPassword($password);

    $resultCreate = $patient->save();
    if ($resultCreate == true) {
        $resultView = "Patient ajouté";
        $result = 1;
    } else {
        $resultView = "Erreur";
    }


    $lastid = $pdo->lastInsertId();
}


header('location: profil.html?user_id="' . $lastid . '"&error="'.$error.'"');
exit;
