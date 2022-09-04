<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Page administrateur / <?= $pageTitle; ?></h1>
        </div>
    </div>

    <div class="offset-md-1 col-10">
        <div class="row boxContact">
            <div class="col-2 text-center">Nom</div>
            <div class="col-2 text-center">Prénom</div>
            <div class="col-2 text-center">Email</div>
            <div class="col-2 text-center">Téléphone</div>
            <div class="col-4 text-center">Adresse</div>
        </div>
        <?php
        $usersList = $pdo->query("SELECT    `id_client`, 
                                        `users_gender`, 
                                        `users_lastname`, 
                                        `users_firstname`, 
                                        `users_email`, 
                                        `users_phone_number`, 
                                        `users_birthdate`, 
                                        `users_status`, 
                                        `id_client_type`,
                                        `id_addresses_ships`,
                                        `addresses_ships`.`addresses_ship_address`,
                                        `addresses_ships`.`addresses_ship_address_more`,
                                        `addresses_ships`.`addresses_ship_postal_code`,
                                        `addresses_ships`.`addresses_ship_city`
                                FROM `users` 
                                INNER JOIN `addresses_ships` ON `users`.`id_addresses_ships` = `addresses_ships`.`id_adress_ship`
                                ORDER BY `users_lastname` ASC");
        foreach ($usersList  as $value) : ?>
            <div class="row my-2 py-2 boxContact">
                <div class="col-2"><?= $value['users_gender'] = 0 ? 'Mme' : 'M.'; ?> <?= $value['users_lastname']; ?></div>
                <div class="col-2"><?= $value['users_firstname']; ?></div>
                <div class="col-2"><?= $value['users_email']; ?></div>
                <div class="col-2"><?= $value['users_phone_number']; ?></div>
                <div class="col-3">
                    <span><?= $value['addresses_ship_address']; ?>
                        <?= $value['addresses_ship_address_more'] ? '<br>' . $value['addresses_ship_address_more'] : ''; ?>
                        <br><?= $value['addresses_ship_postal_code']; ?>, <?= $value['addresses_ship_city']; ?></span>
                </div>
                <div class="col-1 text-center">
                    <a href="index.php?page=users&action=modify&id=<?= $value['id_client']; ?>" class="btn btnValid">
                        <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/aslgozpd.json" trigger="hover" colors="primary:#121331" state="hover" >
                        </lord-icon>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>