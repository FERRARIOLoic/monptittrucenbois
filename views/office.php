<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1><?= $pageTitle; ?></h1>
        </div>
    </div>

    <div class="row descriptionPage text-center fs-4">
        <div class="col-6 py-2">Modèles uniques réalisée sans copieur</div>
        <div class="col-6 py-2">Essences de Frêne, Hêtre, Chêne, Merisier et bien d'autres</div>
    </div>

    <div class="row">
        <!------------- BOX BOITE --------->
        <div class="col-12">
            <div class="row boxContact boxProductVue">
                <?php
                foreach ($productsCategory as $productsName) : ?>
                    <div class="col-6 col-md-2 text-center align-self-center fs-3 py-2">
                        <a href="#<?= $productsName['id_product']; ?>">
                            <h4><?= $productsName['products_name']; ?></h4>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!------------- BOX BOITE --------->
        <div id="boite" class="col-12">
            <div class="row boxContact boxProductVue">
                <div class="col-12 text-center align-self-center fs-3 py-3">
                    <h2>Boite</h2>
                </div>
                <div class="col-12 py-3 boxProductVue text-center">
                    <strong>10cm de hauteur, Motif pyrogravé, verni, réalisé en deux modèles</strong>
                </div>
                <div class="col-12 col-md-5 border-2 border-secondary border-top py-3 boxProductVue">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 py-2 text-center"><strong>Modèle rond - 40€</strong></div>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($productsCategory as $productsInfo) : ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 py-2">
                                        <img class="productImg" src="../public/assets/img/products/box/boxBig_01.jpg">
                                    </div>
                                    <div class="col-6 py-2 align-self-center"><?= $productsInfo['products_name']; ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-12 col-md-5 border-2 border-secondary border-top py-3 boxProductVue">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 py-2 text-center"><strong>Modèle ovale - 30€</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 py-2">
                            <img class="productImg" src="../public/assets/img/products/box/boxSmall_01.jpg">
                        </div>
                        <div class="col-6 py-2 align-self-center">Duo de roses</div>
                    </div>
                    <div class="row">
                        <div class="col-6 py-2">
                            <img class="productImg" src="../public/assets/img/products/box/boxSmall_02.jpg">
                        </div>
                        <div class="col-6 py-2 align-self-center">Lierre</div>
                    </div>
                    <div class="row">
                        <div class="col-6 py-2">
                            <img class="productImg" src="../public/assets/img/products/box/boxSmall_03.jpg">
                        </div>
                        <div class="col-6 py-2 align-self-center">Pied de rose</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>