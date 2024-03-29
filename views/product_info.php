<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 offset-md-3 col-md-6 text-center align-self-center border-bottom border-1">
            <h1><?= $product_info->products_name; ?></h1>
        </div>
    </div>

    <div class="row">
        <!------------- BOX BOITE --------->
        <div class="col-12 col-md-6 py-4" id='<?= $product_info->id_product; ?>'>
            <div class="row  boxProductVue my-3 mx-md-2">
                <div class="col-12 text-center align-self-center boxProductImg d-flex">
                    <img class="productImg align-self-center" src="/public/assets/img/products/<?= $pageTitle ?>/<?= $product_info->id_product; ?>.jpg">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 py-4" id='<?= $product_info->id_product; ?>'>
            <div class="row boxContact boxProductVue my-3 mx-md-2">
                <div class="offset-md-2 col-8 py-2 px-4 text-center align-self-center border-bottom border-1">
                    <h4>Informations du produit</h4>
                </div>
                <div class="col-md-2 align-self-center text-end">
                    <?php
                    // var_dump(isset($_SESSION['user']->users_admin));die;
                    if (isset($_SESSION['user']->users_admin)) { ?>
                        <form action="administrateur.html?display=productsCreate" method="post">
                            <input type='hidden' name='id_product' value='<?= $product_info->id_product; ?>'>
                            <button type="submit" class="btn btnValidSmallX" alt='Modifier les informations du produit' title='Modifier les informations du produit'>
                                <lord-icon src="https://cdn.lordicon.com/iiixgoqp.json" trigger="hover" colors="primary:#663300" style="width:20px;height:20px">
                                </lord-icon>
                            </button>
                        </form>
                    <?php } ?>
                </div>
                <div class="col-11 text-center py-2 px-4 boxContact align-self-center">
                    <?= $product_info->products_description; ?>
                </div>
                <div class="col-4 py-2 px-4">
                    Bois utilisé : <br><strong><?= $product_info->woods_name; ?></strong>
                </div>
                <div class="col-4 py-2 px-4">
                    Poids : <br><strong><?= $product_info->products_weight; ?> gr</strong>
                </div>
                <div class="col-4 py-2 px-4">
                    Prix : <br><strong><?= $product_info->products_price; ?> €</strong>
                </div>
                <div class="col-4 py-2 px-4">
                    Temps de fabrication : <br><strong><?= ($product_info->products_time != NULL) ? $product_info->products_time . '  minutes' : 'Information inconnue'; ?></strong>
                </div>
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <div class="col-12 py-3 text-center align-self-end border-top border-1">
                        <form action='' method='post'>
                            <input type='hidden' name='id_product' value='<?= $product_info->id_product; ?>'>
                            <div class="row">
                                <div class="col-4 text-end align-self-center">
                                    Quantité :
                                </div>
                                <div class="col-2 text-end align-self-center">
                                    <select class='form-select' name='quantity'>
                                        <?php for ($i = 1; $i <= 10; $i++) : ?>
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
                        <div class="col-12 py-3 text-center align-self-end  border-top border-1">
                            <span class='text-danger fw-bold'><a href='inscription.html'>S'inscrire</a> ou <a href='connexion.html'>Se connecter</a> pour commander</span></a>
                        </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>