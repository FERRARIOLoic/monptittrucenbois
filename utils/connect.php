<?php

//------------- CONNECTION DATABASE ---------//
define('DB_HOST', 'localhost');
define('DB_NAME', 'monptittrucenbois');
define('DB_USER', 'monptittrucenbois');
define('DB_PASS', 'MonPtitTrucEnBois');

class Database
{

    public static function DBconnect(): PDO
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
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
}
