<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="offset-md-2 col-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>
                <div class=" col-12 px-4">
                    <!------------- BOX CATEGORY --------->
                    <div class="row">
                        <form class="col-12" action="<?= isset($_POST['id_product']) ? 'administrateur_modifier_produit' : '' ?>" method="post" enctype="multipart/form-data">
                            <input type='hidden' name='id_product' value='<?= $id_product ?>'>
                            <div class="row boxContact">
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group my-2">
                                                <label for="category">Catégorie</label>
                                                <select id='category' class="form-select" name="id_category">
                                                    <option value="">Sélectionner une catégorie</option>
                                                    <option value=""></option>
                                                    <?php
                                                    // var_dump($productsListCategories);die;
                                                    foreach ($productsListCategories as $categories) : ?>
                                                        <option value="<?= $categories->id_category; ?>" <?= (($categoryInfo ?? '') == $categories->id_category) ? 'selected' : '' ?>><?= $categories->categories_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group my-2">
                                                <label for="name">Nom du produit</label>
                                                <input type="text" class="form-control" id="name" name="product_name" placeholder="Nom du produit" value="<?= $ProductInfo->products_name ?? '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group my-2">
                                                <label for="wood">Bois utilisé</label>
                                                <select id='wood' class="form-select" name="id_wood" placeholder="Sélectionner un bois">
                                                    <option value="">Sélectionner un bois</option>
                                                    <option value=""></option>
                                                    <?php
                                                    foreach ($woodList as $woodType) : ?>
                                                        <option value="<?= $woodType->id_wood; ?>" <?= (($woodInfo ?? '') == $woodType->id_wood) ? 'selected' : '' ?>><?= $woodType->woods_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-center">
                                            <div class="row my-2">
                                                <div class="col-12 align-self-top ">
                                                    Personnalisable
                                                </div>
                                                <div class="col-6 my-2">
                                                    <input type='checkbox' id='custom_text' name='product_custom_text' <?= (($ProductInfo->products_custom_text??'')==1)?'checked':''; ?>><label for='custom_text'><span class='px-2'>Texte</span></label>
                                                </div>
                                                <div class="col-6 my-2">
                                                    <input type='checkbox' id='custom_draw' name='product_custom_draw' <?= (($ProductInfo->products_custom_draw??'')==1)?'checked':''; ?>><label for='custom_draw'><span class='px-2'>Dessin</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group my-2">
                                                <label for="description">Description du produit</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description du produit"><?= $ProductInfo->products_description ?? '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group my-2">
                                                <label for="weight">Poids (gr)</label>
                                                <input type="text" class="form-control" id="weight" name="weight" placeholder="Poids" value="<?= $ProductInfo->products_weight ?? '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group my-2">
                                                <label for="price">Prix (TTC)</label>
                                                <input type="text" class="form-control" id="price" name="price" placeholder="Prix du produit" value="<?= $ProductInfo->products_price ?? '' ? ($ProductInfo->products_price . ' €') : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group my-2">
                                                <label for="time">Temps de fabrication</label>
                                                <input type="text" class="form-control" id="time" name="time" placeholder="En minutes" value="<?= $ProductInfo->products_time ?? '' ? ($ProductInfo->products_time) : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row my-2">
                                                <div class="col-12 col-md-6 align-self-center">Dimensions (cm)<br><span class='text_small'>(Longueur x largeur x hauteur)</span></div>
                                                <div class="col-4 col-md-2"><input type='text' class='form-control' name='product_width' placeholder='L' value=<?= $ProductInfo->products_width??''; ?>></div>
                                                <div class="col-4 col-md-2"><input type='text' class='form-control' name='product_lenght' placeholder='l' value=<?= $ProductInfo->products_lenght??''; ?>></div>
                                                <div class="col-4 col-md-2"><input type='text' class='form-control' name='product_height' placeholder='h' value=<?= $ProductInfo->products_height??''; ?>></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group my-2">
                                                Image du produit
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" id="image" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 text-center">
                                    <?php
                                    if (isset($_POST['id_product'])) { ?>
                                        <button type="submit" class="btn btnValid my-2"><strong>Enregistrer les modifications</strong></button>
                                    <?php } else { ?>
                                        <button type="submit" class="btn btnValid my-2"><strong>Enregistrer le produit</strong></button>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>