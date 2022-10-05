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
                        <a href='#<?= $productName->id_product; ?>'>
                            <h4 class='productCategoryText'><?= $productName->products_name; ?></h4>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!------------- BOX BOITE --------->
        <?php foreach ($products_list_category as $productInfo) : ?>
            <div class="col-12 col-md-4 py-4" id='<?= $productInfo->id_product; ?>'>
                <div class="row boxContact boxProductVue my-3 mx-md-2">
                    <div class="col-12 text-center align-self-center fs-3 py-2 border-bottom border-1">
                        <h4><?= $productInfo->products_name; ?></h4>
                    </div>
                    <div class="col-12 text-center boxProductImg d-flex">
                        <img class="productImg align-self-center" src="/public/assets/img/products/<?= $pageTitle ?>/<?= $productInfo->id_product; ?>.jpg" alt='<?= $productInfo->products_name; ?>' title='<?= $productInfo->products_name; ?>'>
                    </div>
                    <div class="col-12 py-2 px-4 boxProductDescription">
                        <?= $productInfo->products_description; ?>
                    </div>
                    <div class="col-4 py-2 px-4">
                        Bois utilisé : <br><strong><?= $productInfo->woods_name; ?></strong>
                    </div>
                    <div class="col-4 py-2 px-4">
                        Poids : <br><strong><?= $productInfo->products_weight; ?> gr</strong>
                    </div>
                    <div class="col-4 py-2 px-4">
                        Prix : <br><strong><?= $productInfo->products_price; ?> €</strong>
                    </div>
                    <div class="col-12 text-end fst-italic productCategoryText">
                        <a class='text-black' href='informations_produit.html?id_product=<?= $productInfo->id_product; ?>'>Plus d'informations...</a>
                    </div>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <div class="col-12 py-3 text-center align-self-end border-top border-1">
                            <form action='' method='post'>
                                <input type='hidden' name='id_product' value='<?= $productInfo->id_product; ?>'>
                                <div class="row">
                                    <div class="col-3 text-end align-self-center">
                                        Quantité : 
                                    </div>
                                    <div class="col-3 text-end align-self-center">
                                        <select class='form-select' name='quantity'>
                                            <?php for ($i=1; $i <= 10; $i++) :?> 
                                            <option><?= $i ?></option>
                                            <?php endfor ?>
                                        </select>
                                    </div>
                                    <div class="col-6 text-start">
                                        <button type='submit' class='btn btnValidSmall' name='action_product' value='order'>Ajouter au panier</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } else { ?>
                        <div class="col-12 py-3 text-center align-self-end productCategoryText border-top border-1">
                            <span class='text-danger fw-bold'><a href='inscription.html'>S'inscrire</a> ou <a href='connexion.html'>Se connecter</a> pour commander</span></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>