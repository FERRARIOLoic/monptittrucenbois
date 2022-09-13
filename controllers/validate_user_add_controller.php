<?php
require_once(__DIR__.'/../utils/jwt.php');
require_once(__DIR__.'/../models/users.php');


$datas = JWT::is_jwt_valid($_GET['token']);

if ($datas === false) {
    $message = "Votre compte n\'a pas pu être vérifié";
} else {
    $email = $datas->mail;
    if (User::validated($mail)) {
        $message = "Votre compte a été validé";
    }
}
