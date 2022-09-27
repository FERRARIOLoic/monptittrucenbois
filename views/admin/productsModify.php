<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Page administrateur / <?= $pageTitle; ?></h1>
        </div>
    </div>


    <div class="row mt-5">
        <form class="col-12 offset-md-1 col-md-10" action="administrateur.html?display=productsCreate" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Sélectionner un produit</label>
                            <select class="form-select" name="id_product">
                                <?php
                                foreach ($ProductsList as $product) : 
                                // var_dump($product->id_product);die;
                                ?>
                                    <option value="<?= $product->id_product; ?>"><?= $product->products_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btnValid">Modifier</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</main>