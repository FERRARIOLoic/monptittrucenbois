<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="offset-md-2 col-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>

                <form class="col-12 px-md-5" action="administrateur.html?display=productsCreate" method="post" enctype="multipart/form-data">
                    <div class="row boxContact">
                        <div class="col-12 col-md-6 py-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Sélectionner un produit</label>
                                    <select class="form-select" name="id_product">
                                        <?php
                                        // var_dump($ProductsList);die;
                                        foreach ($ProductsList as $product) :
                                        ?>
                                            <option value="<?= $product->id_product; ?>"><?= $product->products_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-6 align-self-center">
                                    <button type="submit" class="btn btnValid">Modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>