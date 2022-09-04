<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1><?= $pageTitle; ?></h1>
        </div>
    </div>

    <div class="row descriptionPage text-center">
        <div class="col-6 py-2">Réalisés en bois compressés (contre-plaqué)</div>
        <div class="col-6 py-2">Pour l'intérieur ou pour l'extérieur</div>
        <div class="col-6 py-2">Différentes épaisseurs</div>
        <div class="col-6 py-2">Personnalisables</div>
    </div>

    <div class="row">
        <!------------- BOX BOITE --------->
        <div class="col-12">
            <div class="row boxContact boxProductVue my-3 mx-md-5">
                <?php
                $productsCategorySelect = $pdo->query("SELECT * FROM `products` WHERE id_product_category = 3 ORDER BY products_name");
                foreach ($productsCategorySelect as $key => $productName) : ?>
                    <div id="btnProductInfo" data-product="<?= $productName['products_name']; ?>" class="col-6 col-md-2 text-center align-self-center fs-3 py-2">
                        
                            <h4><?= $productName['products_name']; ?></h4>
                        
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!------------- BOX BOITE --------->
        <div id="productInfoVue" class="col-12">
        </div>
    </div>
</main>