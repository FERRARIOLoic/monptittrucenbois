<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <?php
        if (isset($_POST['id_product'])) { ?>
            <form class="col-12 offset-md-1 col-md-10" action="administrateur.html?display=productsModify" method="post" enctype="multipart/form-data">
                <input type='hidden' name='id_product' value='<?= $id_product ?>'>
            <?php } else { ?>
                <form class="col-12 offset-md-1 col-md-10" action="" method="post" enctype="multipart/form-data">
                <?php } ?>
                <div class="row boxContact">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group my-2">
                                    <label for="name">Catégorie</label>
                                    <select class="form-select" name="id_category">
                                        <option value="">Sélectionner une catégorie</option>
                                        <option value=""></option>
                                        <?php
                                        foreach ($productsListCategories as $categories) : ?>
                                            <option value="<?= $categories->id_category; ?>" <?= ($categoryInfo ?? '' == $categories->id_category) ? 'selected' : '' ?>><?= $categories->categories_name; ?></option>
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
                                    <label for="description">Bois utilisé</label>
                                    <select class="form-select" name="id_wood" placeholder="Sélectionner un bois">
                                        <option value="">Sélectionner un bois</option>
                                        <option value=""></option>
                                        <?php
                                        foreach ($woodList as $woodType) : ?>
                                            <option value="<?= $woodType->id_wood; ?>" <?= ($woodInfo ?? '' == $woodType->id_wood) ? 'selected' : '' ?>><?= $woodType->woods_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group my-2">
                                    <label for="description">Description du produit</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description du produit"><?= $ProductInfo->products_description ?? '' ?></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group my-2">
                                    <label for="weight">Poids (en grammes)</label>
                                    <input type="text" class="form-control" id="weight" name="weight" placeholder="Poids" value="<?= $ProductInfo->products_weight ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group my-2">
                                    <label for="price">Prix</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Prix du produit" value="<?= $ProductInfo->products_price ?? '' ? ($ProductInfo->products_price . ' €') : ''; ?>">
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
                                    <!--<img src="<?= $ProductInfo->products_image; ?>" alt="<?= $productName; ?>" class="img-fluid imgPreview">-->
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

</main>