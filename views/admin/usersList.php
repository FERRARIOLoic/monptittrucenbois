<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <div class="offset-md-1 col-10">
            <?php
            $usersList = User::getAll();
            foreach ($usersList  as $value) :
                $user_addresses = Address::getAddressInfo($value->user_id);
            ?>
                <div class="row my-2 py-2 boxContact">
                    <div class="col-3"><?= $value->users_gender = 0 ? 'Mme' : 'M.'; ?> <?= $value->users_lastname; ?></div>
                    <div class="col-2"><?= $value->users_firstname; ?></div>
                    <div class="col-3"><?= $value->users_email; ?></div>
                    <div class="col-2 text-center"><?= $value->users_phone; ?></div>
                    <div class="col-2 text-center"><?= $value->users_birthdate; ?></div>
                    <div class="col-12 py-2">
                        <div class="row px-2">
                            <div class="col-12 boxSubCategory">
                                <div class="row py-2">
                                    <div class="col-2 align-self-center">
                                        Adresse postale
                                    </div>
                                    <div class="col-5">
                                        <?= $user_addresses->addresses_address; ?>
                                        <?= $user_addresses->addresses_address_more ? '<br>' . $user_addresses->addresses_address_more : ''; ?>
                                    </div>
                                    <div class="col-2">
                                        <?= $user_addresses->addresses_postal_code; ?>
                                    </div>
                                    <div class="col-2">
                                        <?= $user_addresses->addresses_city; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 py-2">
                        <div class="row px-2">
                            <div class="col-12 boxSubCategory">
                                <div class="row py-2">
                                    <div class="col-4 align-self-center">
                                        Créé le :
                                        <?= $value->users_created_at; ?>
                                    </div>
                                    <div class="col-4 align-self-center">
                                        Activé le :
                                        <?= $value->users_validated_at; ?>
                                    </div>
                                    <div class="col-4 align-self-center">
                                        Dernière visite le :
                                        <?= $value->users_connected_at; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 boxSubCategory px-3">
                        </div>
                    </div>
                </div>

        </div>
    <?php endforeach; ?>
    </div>
</main>