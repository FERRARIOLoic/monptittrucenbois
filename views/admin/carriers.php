<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="offset-md-2 col-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>
                <!------------- CARRIERS LIST --------->
                <div class="col-12 col-md-12 px-5 py-4 text-center">
                    <div class="row boxContact">
                        <div class="col-12 text-center align-self-center ">
                            <h2>Transporteurs</h2>
                        </div>
                        <?php
                        if ($resultCarrier == 0) { ?>
                            <div class="col-12 my-2 text-center align-self-center errorBox d-flex justify-content-center justify-self-center">
                                <span class="align-self-center errorForm">Erreur, le transporteur n'a pas été enregistré</span>
                            </div>
                        <?php } elseif ($resultCarrier == 1) { ?>
                            <div class="col-12 my-2 text-center align-self-center validBox d-flex justify-content-center justify-self-center">
                                <span class="align-self-center validForm">Le transporteur à bien été enregistré</span>
                            </div>
                        <?php } elseif ($resultCarrier == 2) { ?>
                            <div class="col-12 my-2 text-center align-self-center validBox d-flex justify-content-center justify-self-center">
                                <span class="align-self-center validForm">Le transporteur a bien été mis à jour</span>
                            </div>
                        <?php } elseif ($resultCarrier == 3) { ?>
                            <div class="col-12 my-2 text-center align-self-center validBox d-flex justify-content-center justify-self-center">
                                <span class="align-self-center validForm">Le transporteur à bien été supprimé</span>
                            </div>
                        <?php }
                        unset($resultCarrier);
                        ?>
                        <!------------- ADD NEW CARRIER --------->
                        <div class="col-12 text-start border-bottom border-1">
                            <form action="" method="post">
                                <input type="hidden" name="admin_view" value="carriers">
                                <div class="row py-2">
                                    <div class="col-12 col-md-3 py-2 align-self-center">
                                        <input type="text" class="form-control" name="carriers_name" placeholder="Nom du transporteur" required>
                                    </div>
                                    <div class="col-12 col-md-3 py-2 align-self-center">
                                        <input type="text" class="form-control" name="carriers_phone" placeholder="Numéro de téléphone">
                                    </div>
                                    <div class="col-12 col-md-3 py-2 align-self-center">
                                        <input type="email" class="form-control" name="carriers_email" placeholder="Adresse Email">
                                    </div>
                                    <div class="col-12 col-md-3 py-2 align-self-center">
                                        <input type="submit" class="btn btnModify" value="Ajouter">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!------------- MODIFY CARRIER --------->
                        <div class="col-12 text-start">
                            <?php
                            $carriersList = Carrier::getCarrier();
                            foreach ($carriersList as $carrier) : ?>
                                <form action="" method="post">
                                    <input type="hidden" name="admin_view" value="carriers">
                                    <input type="hidden" name="id_carrier" value="<?= $carrier->id_carrier; ?>">
                                    <div class="row p-2">
                                        <div class="col-12 border-2 rounded boxSubCategory">
                                            <div class="row py-2">

                                                <div class="col-12 col-md-3 py-2 align-self-center">
                                                    <input type="text" class="form-control" name="carriers_name" value="<?= $carrier->carriers_name; ?>" required>
                                                </div>
                                                <div class="col-12 col-md-3 py-2 align-self-center">
                                                    <input type="text" class="form-control" name="carriers_phone" value="<?= $carrier->carriers_phone; ?>">
                                                </div>
                                                <div class="col-12 col-md-3 py-2 align-self-center">
                                                    <input type="text" class="form-control" name="carriers_email" value="<?= $carrier->carriers_email; ?>">
                                                </div>
                                                <div class="col-12 col-md-3 py-2 align-self-center">
                                                    <input type="submit" class="btn btnModify" value="Modifier">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>