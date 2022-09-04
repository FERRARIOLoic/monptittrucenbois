<?php

require_once(__DIR__ . '/../config/config.php');

function db_connect()
{

    $dsn = 'mysql:host=' . DB_HOST . ';dbname=monptittrucenbois';
    $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
    ];
    $pdo = null;

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $option);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        echo 'Connection failed: ' . $ex->getMessage();
        die();
    }
    return $pdo;
}
