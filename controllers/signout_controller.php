<?php
session_start();

require_once __DIR__ . '/../utils/connect.php';

session_unset();
session_destroy();

// var_dump($_SESSION);die;

header('location: /');