<?php

$productName = "Boite à dents";
$productDescription = "Une boite à dents";
$productWood = "Chêne";
$productWeight = "1kg";
$productPrice = "10";
$productImage = "../public/assets/img/products/toothBox/toothBox_1_02.jpg";

?>



<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Page administrateur / <?= $pageTitle; ?></h1>
        </div>
    </div>


    <div class="row mt-5">
        <form class="col-12 offset-md-1 col-md-10" action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group my-2">
                                <label for="name">Catégorie</label>
                                <select class="form-control" name="category">
                                    <?php
                                    $productsListCategories = $pdo->query("SELECT * FROM products_categories ORDER BY category");
                                    foreach ($productsListCategories as $categories) : ?>
                                        <option value="<?= $categories['id_product_category']; ?>"><?= $categories['category']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group my-2">
                                <label for="name">Type de produit</label>
                                <select class="form-control" name="category">
                                    <?php
                                    $productsListTypes = $pdo->query("SELECT * FROM products_types ORDER BY product_type");
                                    foreach ($productsListTypes as $productsType) : ?>
                                        <option value="<?= $productsType['id_product_type']; ?>"><?= $productsType['product_type']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group my-2">
                                <label for="name">Nom du produit</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nom du produit" value="<?= $productName; ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group my-2">
                                <label for="description">Fabriqué en bois de</label>
                                    <select class="form-control" name="wood">
                                        <?php
                                        $woodsList = $pdo->query("SELECT * FROM woods ORDER BY woods_name");
                                        foreach ($woodsList as $woods) : ?>
                                            <option value="<?= $woods['id_wood']; ?>"><?= $woods['woods_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group my-2">
                                <label for="description">Description du produit</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description du produit"><?= $productDescription; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group my-2">
                                <label for="weight">Poids</label>
                                <input type="text" class="form-control" id="weight" name="weight" placeholder="Poids" value="<?= $productWeight; ?>">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group my-2">
                                <label for="price">Prix</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Prix du produit" value="<?= $productPrice . ' €'; ?>">
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
                                <img src="<?= $productImage; ?>" alt="<?= $productName; ?>" class="img-fluid imgPreview">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <button type="submit" class="btn btnValid my-2"><strong>Enregistrer le produit</strong></button>
                </div>
            </div>
        </form>
    </div>

</main>