<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="col-12 offset-md-2 col-md-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>
                <!------------- CARRIERS LIST --------->
                <div class="col-12 col-md-12 px-md-4 py-4 text-center">
                    <div class="row boxContact">
                        <div class="col-12 text-center align-self-center ">
                            <h2>Ajouter un transporteur</h2>
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
                        <div class="col-12 text-start">
                            <form action="" method="post">
                                <input type="hidden" name="admin_view" value="carriers">
                                <div class="row py-2">
                                    <div class="col-12 col-md-4 py-2 align-self-center">
                                        <input type="text" class="form-control" name="carriers_name" placeholder="Nom du transporteur" required>
                                    </div>
                                    <div class="col-12 col-md-4 py-2 align-self-center">
                                        <input type="text" class="form-control" name="carriers_phone" placeholder="Numéro de téléphone">
                                    </div>
                                    <div class="col-12 col-md-4 py-2 align-self-center">
                                        <input type="email" class="form-control" name="carriers_email" placeholder="Adresse Email">
                                    </div>
                                    <div class="col-12 col-md-10 py-2 align-self-center">
                                        <input type="text" class="form-control" name="carriers_ship_follow" placeholder="Lien vers le suivi de colis">
                                    </div>
                                    <div class="col-12 col-md-2 py-2 align-self-center">
                                        <input type="submit" class="btn btnModify" value="Ajouter">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!------------- MODIFY CARRIER --------->
                <?php
                $carriersList = Carrier::getCarrier();
                foreach ($carriersList as $carrier) : ?>
                    <div class="col-12 col-md-12 px-md-4 pt-3 text-center ">
                        <div class="row boxContact">
                            <form action="" method="post" class="col-12 text-start">
                                <input type="hidden" name="admin_view" value="carriers">
                                <input type="hidden" name="id_carrier" value="<?= $carrier->id_carrier; ?>">
                                <div class="row py-2">
                                    <div class="col-12 col-md-4 py-2 align-self-center">
                                        <div class="row px-2">
                                            <div class="col-12 py-2 boxSubCategoryUp">
                                                Nom du transporteur
                                            </div>
                                            <div class="col-12 py-2 boxSubCategoryDownGrey">
                                                <input type="text" class="form-control" name="carriers_name" value="<?= $carrier->carriers_name; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 py-2 align-self-center">
                                        <div class="row px-2">
                                            <div class="col-12 py-2 boxSubCategoryUp">
                                                Numéro de téléphone
                                            </div>
                                            <div class="col-12 py-2 boxSubCategoryDownGrey">
                                                <input type="text" class="form-control" name="carriers_phone" value="<?= $carrier->carriers_phone; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 py-2 align-self-center">
                                        <div class="row px-2">
                                            <div class="col-12 py-2 boxSubCategoryUp">
                                                Adresse mail
                                            </div>
                                            <div class="col-12 py-2 boxSubCategoryDownGrey">
                                                <input type="text" class="form-control" name="carriers_email" value="<?= $carrier->carriers_email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-11 py-2 align-self-center">
                                        <div class="row px-2">
                                            <div class="col-12 py-2 boxSubCategoryUp">
                                                Lien vers le suivi de colis
                                            </div>
                                            <div class="col-12 py-2 boxSubCategoryDownGrey">
                                                <input type="text" class="form-control" name="carriers_ship_follow" value="<?= isset($carrier->carriers_ship_follow)?$carrier->carriers_ship_follow:'...'; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-1 py-2 align-self-center">
                                        <button type="submit" class="btn btnModify">
                                            <lord-icon src="https://cdn.lordicon.com/dnmvmpfk.json" trigger="hover" colors="primary:#663300">
                                            </lord-icon>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>