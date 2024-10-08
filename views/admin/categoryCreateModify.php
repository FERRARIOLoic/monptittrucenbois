<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="offset-md-2 col-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row mt-5">
                        <div class="col-12 offset-md-1 col-md-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row boxContact py-3">
                                        <div class="col-12 py-2 text-center">
                                            <h3>Liste des catégories existantes</h3>
                                        </div>
                                        <?php
                                        foreach ($categoriesList as $category) : ?>
                                            <form action="administrateur.html?display=categoryCreateModify" method="post">
                                                <input type="hidden" name="admin_view" value="dataModify">
                                                <input type="hidden" name="id_category" value="<?= $category->id_category; ?>">
                                                <div class="row py-2">
                                                    <div class="col-7 align-self-center">
                                                        <input type="text" class="form-control" name="category_name" value="<?= $category->categories_name; ?>">
                                                    </div>
                                                    <div class="col-3 align-self-center">
                                                        <button type="submit" class="btn btnValidSmallX" name="action_category" value="modify" alt='Enregistrer les modifications' title='Enregistrer les modifications'>Modifier</button>
                                                    </div>
                                                    <div class="col-2 align-self-center">
                                                        <button type="submit" class="btn btnValidSmallX" name="action_category" value="delete" alt='Supprimer la catégorie' title='Supprimer la catégorie'>X</button>
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
                <div class="col-12 col-md-6">

                    <!------------- CATEGORY INFO TO ADD / MODIFY --------->
                    <div class="row mt-5">
                        <form class="col-12 offset-md-1 col-md-10" action="administrateur.html?display=categoryCreateModify" method="post">
                            <input type='hidden' name='id_category' value='<?= $id_category ?? NULL ?>'>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row boxContact py-3">
                                        <div class="col-12 py-2 text-center">
                                            <h3>Informations de la catégorie</h3>
                                        </div>
                                        <?php
                                        if (isset($resultCategory)) {

                                            if ($resultCategory == 0) { ?>
                                                <div class="col-12 my-2 text-center align-self-center errorBox d-flex justify-content-center justify-self-center">
                                                    <span class="align-self-center errorForm">Erreur, la catégorie n'a pas été enregistrée</span>
                                                </div>
                                            <?php } elseif ($resultCategory == 1) { ?>
                                                <div class="col-12 my-2 text-center align-self-center validBox d-flex justify-content-center justify-self-center">
                                                    <span class="align-self-center validForm">La catégorie à bien été enregistrée</span>
                                                </div>
                                            <?php } elseif ($resultCategory == 2) { ?>
                                                <div class="col-12 my-2 text-center align-self-center validBox d-flex justify-content-center justify-self-center">
                                                    <span class="align-self-center validForm">La catégorie à bien été supprimée</span>
                                                </div>
                                        <?php }
                                        }
                                        unset($resultCategory); ?>
                                        <div class="col-12 py-2">
                                            <input type='text' class='form-control' name='categories' placeholder='Nom de la catégorie' value='<?= $category_info->categories ?? '' ?>'>
                                        </div>
                                        <div class="col-12 py-2 text-center">
                                            <button type="submit" class="btn btnValid">Enregistrer les informations</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>