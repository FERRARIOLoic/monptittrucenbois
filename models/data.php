<?php
$users = [
    'Dracow' => [
        'login' => 'Dracow',
        'particular' => '0',
        'gender' => '1',
        'password' => 'moi',
        'email' => 'moi@gmail.com',
        'firstname' => 'Loïc',
        'lastname' => 'FERRARIO',
        'address' => 'quai Danton',
        'addressMore' => 'No',
        'postalCode' => '80000',
        'city' => 'Amiens',
        'phoneNumber' => '0691929394',
        'birthday' => '13/09/1982',
        'contact' => ['email' => '1', 'phone' => '1', 'adress' => '0'],
        'admin' => '1',
        'active' => '1',
    ],
    'Thierry' => [
        'login' => 'Grosminet',
        'particular' => '1',
        'gender' => '1',
        'password' => 'titi',
        'email' => 'titi@gmail.com',
        'firstname' => 'Thierry',
        'lastname' => 'LACHAT',
        'address' => '1 Rue du quai',
        'addressMore' => 'No',
        'postalCode' => '80000',
        'city' => 'Amiens',
        'phoneNumber' => '0691929394',
        'birthday' => '27/09/1978',
        'contact' => ['email' => '1', 'phone' => '0', 'adress' => '0'],
        'admin' => '0',
        'active' => '1',
    ],
];

$userProfile = [
    'login' => 'Dracow',
    'particular' => '0',
    'gender' => '1',
    'password' => 'moi',
    'email' => 'moi@gmail.com',
    'firstname' => 'Loïc',
    'lastname' => 'FERRARIO',
    'address' => 'quai Danton',
    'addressMore' => 'No',
    'postalCode' => '80000',
    'city' => 'Amiens',
    'phoneNumber' => '0691929394',
    'birthday' => '13/09/1982',
    'contact' => ['email' => '1', 'phone' => '1', 'adress' => '0'],
    'admin' => '1',
    'active' => '1',
];

$category = [
    'Arts de la table' => ['url' => 'arts-de-la-table.html', 'page' => 'artsTable.php', 'image' => 'arts-de-la-table.jpg'],
    'Bureautique' =>  ['url' => 'bureautique.html', 'page' => 'office.php', 'image' => 'bureautique.jpg'],
    'Décoration' =>  ['url' => 'decoration.html', 'page' => 'decoration.php', 'image' => 'decoration.jpg'],
    'Jouets' =>  ['url' => 'jouets.html', 'page' => 'games.php', 'image' => 'jouets.jpg'],
];

$adminListVue = [
    ['name' => 'users', 'displayName' => 'Utilisateurs', 'url' => 'users.php'],
    ['name' => 'orders', 'displayName' => 'Commandes', 'url' => 'orders.php'],
    ['name' => 'events', 'displayName' => 'Evénements', 'url' => 'events.php'],
    ['name' => 'products', 'displayName' => 'Produits', 'url' => 'products.php'],

];

$product = [
    ['category' => 'Arts de la table','name' => 'Boite à dents','description' => 'Une boite à dents','wood' => 'Chêne','weight' => '1','price' => '10'],
    ['category' => 'Décoration','name' => 'Champignon','description' => 'Un champignon décoratif','wood' => 'Chêne','weight' => '2','price' => '15'],
];
