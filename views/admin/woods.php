<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

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
                        <input type="hidden" name="admin_view" value="woods">
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
                            <input type="hidden" name="admin_view" value="woods">
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
</main>