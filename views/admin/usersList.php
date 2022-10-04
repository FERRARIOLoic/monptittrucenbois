<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="offset-md-2 col-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>
                <?php
                $usersList = User::getAll();
                // var_dump($usersList);die;
                foreach ($usersList  as $value) :
                ?>
                    <div class="col-12 px-5 py-2">
                        <div class="row my-2 py-3 boxContact">
                            <div class="col-3 boxContactTitle"><?= ($value->users_gender != 0) ? ($value->users_gender <= 1 ? 'Mme' : 'M.') : ''; ?> <?= $value->users_lastname; ?></div>
                            <div class="col-2 boxContactTitle"><?= $value->users_firstname; ?></div>
                            <div class="col-3"><?= $value->users_email; ?></div>
                            <div class="col-2 text-center"><?= $value->users_phone; ?></div>
                            <div class="col-2 text-center"><?= $value->users_birthdate; ?></div>
                            <div class="col-12 py-2">
                                <div class="row px-2">
                                    <div class="col-12 boxSubCategoryUp">
                                        <div class="row py-2">
                                            <div class="col-12 align-self-center">
                                                Adresse postale
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 boxSubCategoryDownGrey">
                                        <div class="row py-2">
                                            <?php
                                            if (empty($value->addresses_address) and empty($value->addresses_postal_code) and empty($value->addresses_city)) { ?>
                                                <div class="col-12">
                                                    <span class='textUnknown'>Non renseignée</span>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-8">
                                                    <?= $value->addresses_address; ?>
                                                    <?= $value->addresses_address_more ? ', ' . $value->addresses_address_more : ''; ?>
                                                </div>
                                                <div class="col-4">
                                                    <?= $value->addresses_postal_code; ?>, <?= $value->addresses_city; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 py-2">
                                <div class="row px-2">
                                    <div class="col-12 boxSubCategoryUp">
                                        <div class="row py-2">
                                            <div class="col-4 align-self-center">
                                                Créé le :
                                            </div>
                                            <div class="col-4 align-self-center">
                                                Activé le :
                                            </div>
                                            <div class="col-4 align-self-center">
                                                Dernière visite le :
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 boxSubCategoryDownGrey">
                                        <div class="row py-2">
                                            <div class="col-4 align-self-center">
                                                <?= $value->users_created_at; ?>
                                            </div>
                                            <div class="col-4 align-self-center">
                                                <?= $value->users_validated_at; ?>
                                            </div>
                                            <div class="col-4 align-self-center">
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
        </div>
    </div>
</main>