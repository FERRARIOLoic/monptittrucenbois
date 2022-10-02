<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__.'/menu.php'); ?>

        <!------------- WOODS LIST --------->
        <div class="col-12 col-md-6 px-5 py-4 text-center">
            <div class="row boxContact">
                <div class="col-12 text-center align-self-center ">
                    <h2>Types de bois</h2>
                </div>
                <?php
                if ($resultWood == 0) { ?>
                    <div class="col-12 my-2 text-center align-self-center errorBox d-flex justify-content-center justify-self-center">
                        <span class="align-self-center errorForm">Erreur, le bois n'a pas été enregistré</span>
                    </div>
                <?php } elseif ($resultWood == 1) { ?>
                    <div class="col-12 my-2 text-center align-self-center validBox d-flex justify-content-center justify-self-center">
                        <span class="align-self-center validForm">Le nouveau bois à bien été enregistré</span>
                    </div>
                <?php } elseif ($resultWood == 2) { ?>
                    <div class="col-12 my-2 text-center align-self-center validBox d-flex justify-content-center justify-self-center">
                        <span class="align-self-center validForm">Le bois à bien été supprimé</span>
                    </div>
                <?php }
                unset($resultWood); ?>
                <!------------- ADD NEW WOOD TYPE --------->
                <div class="col-12 text-start border-bottom border-1">
                    <form action="" method="post">
                        <input type="hidden" name="admin_view" value="dataModify">
                        <div class="row py-3">
                            <div class="col-8 align-self-center">
                                <input type="text" class="form-control" name="wood_name">
                            </div>
                            <div class="col-4 align-self-center">
                                <button type="submit" class="btn btnModify" name="action_wood" value="add">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!------------- MODIFY WOOD TYPE --------->
                <div class="col-12 text-start">
                    <?php
                    foreach ($woodList as $woodType) : ?>
                        <form action="" method="post">
                            <input type="hidden" name="admin_view" value="dataModify">
                            <input type="hidden" name="id_wood" value="<?= $woodType->id_wood; ?>">
                            <div class="row py-2">
                                <div class="col-7 align-self-center">
                                    <input type="text" class="form-control" name="wood_name" value="<?= $woodType->woods_name; ?>">
                                </div>
                                <div class="col-3 align-self-center">
                                    <button type="submit" class="btn btnModify" name="action_wood" value="modify">Modifier</button>
                                </div>
                                <div class="col-2 align-self-center">
                                    <button type="submit" class="btn btnModify" name="action_wood" value="delete">X</button>
                                </div>
                            </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

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
            <?php } ?>
            <!------------- ADD NEW CARRIER --------->
            <div class="col-12 text-start border-bottom border-1">
                <form action="" method="post">
                    <input type="hidden" name="admin_view" value="dataModify">
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
                        <input type="hidden" name="admin_view" value="dataModify">
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
        </div </div>
</main>