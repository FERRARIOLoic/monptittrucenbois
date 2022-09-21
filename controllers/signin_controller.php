<?php
session_start();


require_once __DIR__ . '/../utils/connect.php';
require_once __DIR__ . '/../models/users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];

    // Récupération de toutes les infos du user en fonction de son email.
    $user = User::getByEmail($email);
    $password_hash = $user->users_password;
    // Cette fonction native renvoie un bool si le password en clair est reconnu dans le password_hash
    $isUserVerified = password_verify($password, $password_hash);
    
    if(!$isUserVerified){
        $errors['global'] = 'Problème de login';
    } else {
        // Si la colonne validate_at est à NULL c'est que l'utilisateur n'a pas encore validé son compte
        if(is_null($user->validated_at)){
            $errors['global'] = 'Votre compte n\'est pas encore validé';
        } else {
            $_SESSION['user'] = $user;
            $_SESSION['admin'] = $user->users_admin;
            header('location: /');
        }

    }
}


include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/signin.php';
include __DIR__.'/../views/templates/footer.php';
