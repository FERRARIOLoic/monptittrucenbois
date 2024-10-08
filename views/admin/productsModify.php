<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="offset-md-2 col-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>

                <form class="col-12 px-md-5" action="administrateur_creation_produit" method="post" enctype="multipart/form-data">
                    <div class="row boxContact py-3">
                        <div class="col-4 align-self-center text-center">
                            <label for="name">Sélectionner un produit</label>
                        </div>
                        <div class='col-5'>
                            <select class="form-select" name="id_product">
                                <?php foreach ($ProductsList as $product) : ?>
                                    <option value="<?= $product->id_product; ?>"><?= $product->products_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-3 align-self-center text-center">
                            <button type="submit" class="btn btnValidSmall">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>