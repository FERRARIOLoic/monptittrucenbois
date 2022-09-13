<?php

// $pdo = Database::DBconnect();

// // ------------- USERS TABLE ---------//
// $users = $pdo->query("SELECT * FROM `users`");
// $users -> execute();
// $users = $users->fetchAll();

// //------------- USER INFO ---------//
// $userInfo = $pdo->query("SELECT * FROM `users` WHERE `users_lastname`=''");
// $userInfo -> execute();
// $userInfo = $userInfo->fetchAll();
// $_SESSION['username']= $userInfo[0]['users_lastname'];
// $username = $_SESSION['username'];
// $_SESSION['id_client'] = $userInfo[0]['id_client'];
// $_SESSION['users_status'] = $userInfo[0]['users_status'];
// // var_dump($_SESSION['users_status']);
// // die;

// // ------------- PRODUCT CATEGORIES TABLE ---------//
// $productsCategories = $pdo->query("SELECT * FROM products_categories ORDER BY category");

// //------------- PRODUCTS TABLE ---------//
// $productsCategory = $pdo->query("SELECT * FROM `products` WHERE id_product_category = 3 ORDER BY products_name");
