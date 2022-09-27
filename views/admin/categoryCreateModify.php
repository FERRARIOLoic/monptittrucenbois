<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Page administrateur / <?= $pageTitle; ?></h1>
        </div>
    </div>

    <div class="row">
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
                                                <input type="text" class="form-control" name="category_name" value="<?= $category->categories; ?>">
                                            </div>
                                            <div class="col-3 align-self-center">
                                                <button type="submit" class="btn btnModify" name="action_category" value="modify">Modifier</button>
                                            </div>
                                            <div class="col-2 align-self-center">
                                                <button type="submit" class="btn btnModify" name="action_category" value="delete">X</button>
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

            <!------------- SELECT CATEGORY TO MODIFY --------->
            <!--<div class="row mt-5">
                <form class="col-12 offset-md-1 col-md-10" action="administrateur.html?display=categoryCreateModify" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="row boxContact py-3">
                                <div class="offset-md-1 col-7 text-center">
                                    <label for="name">Sélectionner la catégorie</label>
                                    <select class="form-select" name="id_category">
                                        <?php
                                        foreach ($categoriesList as $category) :
                                            // var_dump($category->id_category);die;
                                        ?>
                                            <option value="<?= $category->id_category; ?>" <?= (($id_category ?? '') == $category->id_category) ? 'selected' : '' ?>><?= $category->categories; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-4 align-self-end text-center">
                                    <button type="submit" class="btn btnValid">Modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>-->


            <!------------- CATEGORY INFO TO MODIFY --------->
            <div class="row mt-5">
                <form class="col-12 offset-md-1 col-md-10" action="administrateur.html?display=categoryCreateModify" method="post">
                    <input type='hidden' name='id_category' value='<?= $id_category ?>'>
                    <div class="row">
                        <div class="col-12">
                            <div class="row boxContact py-3">
                                <div class="col-12 py-2 text-center">
                                    <h3>Informations de la catégorie</h3>
                                </div>
                                <?php
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
                                <?php } ?>
                                <div class="col-12 py-2">
                                    <input type='text' class='form-control' name='categories' placeholder='Nom de la catégorie' value='<?= $category_info->categories ?? '' ?>'>
                                </div>
                                <div class="col-6 py-2">
                                    <input type='text' class='form-control' name='text1' placeholder='Texte 1' value='<?= $category_info->text1 ?? '' ?>'>
                                </div>
                                <div class="col-6 py-2">
                                    <input type='text' class='form-control' name='text2' placeholder='Texte 2' value='<?= $category_info->text2 ?? '' ?>'>
                                </div>
                                <div class="col-6 py-2">
                                    <input type='text' class='form-control' name='text3' placeholder='Texte 3' value='<?= $category_info->text3 ?? '' ?>'>
                                </div>
                                <div class="col-6 py-2">
                                    <input type='text' class='form-control' name='text4' placeholder='Texte 4' value='<?= $category_info->text4 ?? '' ?>'>
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
</main>