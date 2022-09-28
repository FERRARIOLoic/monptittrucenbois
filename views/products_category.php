<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1><?= $pageTitle; ?></h1>
        </div>
    </div>

    <div class="row">
        <!------------- BOX LISTE DES NOMS DE PRODUITS --------->
        <div class="col-12">
            <div class="row boxContact boxProductVue my-3 mx-md-5">
                <?php
                foreach ($products_list_category as $productName) : ?>
                    <div id="btnProductInfo" data-product="<?= $productName->products_name; ?>" class="col-6 col-md-2 text-center align-self-center fs-3 py-2">
                        <h4><?= $productName->products_name; ?></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!------------- BOX BOITE --------->
        <?php foreach ($products_list_category as $productInfo) : ?>
            <div class="col-6">
                <div class="row boxContact boxProductVue my-3 mx-md-5">
                    <div class="col-12 text-center align-self-center fs-3 py-2">
                        <h4><?= $productInfo->products_name; ?></h4>
                    </div>
                    <div class="col-6 text-center">
                        <img class="productImg" src="/public/assets/img/products/<?= $pageTitle?>/<?= $productInfo->id_product; ?>.jpg">
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12 py-3">
                                <?= $productInfo->products_description; ?>
                            </div>
                            <div class="col-12 py-3">
                                Bois utilisé : <?= $productInfo->woods_name; ?>
                            </div>
                            <div class="col-12 py-3">
                                Poids : <?= $productInfo->products_weight; ?> grammes
                            </div>
                            <div class="col-12 py-3">
                                Prix : <?= $productInfo->products_price; ?> €
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>