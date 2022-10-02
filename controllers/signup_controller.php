<?php
require_once __DIR__ . '/../helpers/modals.php';
require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../helpers/JWT.php';

//------------- LINKS ---------//

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    /*************************** MAIL **************************/
    //**** NETTOYAGE ****/
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    //**** VERIFICATION ****/
    if (empty($email)) {
        $errors['email'] = 'Le champ est obligatoire';
    } else {
        $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$isOk) {
            $errors['email'] = "L'adresse n'est pas valide";
        }
        if(User::isMailExists($email)){
            $errors['email'] = "Erreur, l'adresse mail existe déjà";
        } 
    }
    /***********************************************************/

    $password = $_POST['password'];
    $password_verif = $_POST['password_verif'];

    if($password!==$password_verif){
        $errors['password'] = 'Les mots de passe ne sont pas identiques';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }


    if(empty($errors)){
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        $isUserRegistered = $user->save();
        
        if($isUserRegistered){
            //envoi d'un mail avec lien contenant un jwt
            $subject = "Validez votre inscription";
            $payload = array('email'=> $email, 'exp'=>(time() + 3600));
            $token = JWT::generate($payload);
            $message = 'Merci de valider votre compte en cliquant sur ce lien: <a href="'.$_SERVER['HTTP_ORIGIN'].'/controllers/signup_validate_Controller.php?token='.$token.'">Cliquez-ici</a>';
            mail($email, $subject, $message);
            header('location: /connexion.html');
            exit;
        } else {
            $errors['email'] = 'Un problème est survenu';
        }

    }
    
    /*************************************************************/
}


include(__DIR__ . '/Header.php');

include __DIR__ . '/../views/signup.php';
include __DIR__ . '/../views/templates/footer.php';
