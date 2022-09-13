<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Bienvenue sur le site</h1>
        </div>
    </div>

    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4 ">
            Idées originales pour des cadeaux de mariage, baptême, anniversaire, communion, retraite, Noël...
        </div>
    </div>

    <div class="row py-4">
        <?php
        foreach ($categories_list as $infoCategory) { ?>
            <div class=" col-12 col-md px-4 py-3 p-md-5">
                <!------------- BOX CATEGORY --------->
                <div class="row boxContact">
                    <img src="../public/assets/img/icons/<?= $infoCategory->categories ?>.jpg" alt="<?= $infoCategory->categories ?>" class="productImg">
                    <div class="col-12  text-center align-self-center py-3">
                        <a href="produits.html?category_id=<?= $infoCategory->id_product_category; ?>" class="stretched-link">
                            <h4><?= $infoCategory->categories ?></h4>
                        </a>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>




    <div class="row mt-5">
        <div class="col-12 text-center align-self-center">
            <h1>Comment je travaille</h1>
        </div>
    </div>
    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4 ">
            <p>Je travaille de différentes façons</p>
        </div>
    </div>
    <div class="row ">
        <div class=" col-12 col-md-4 px-4 py-3 p-md-5">
            <!------------- BOX CHANTOURNAGE --------->
            <div class="row boxContact" title="Cliquer pour en apprendre plus...">
                <img src="../public/assets/img/machines/chantournage.jpg" alt="Chantournage" class="productImgWorking">
                <div class="col-12  text-center align-self-center py-3">
                    <a href="informations.html?workingInfo=1" class="stretched-link">
                        <h4>Chantournage</h4>
                    </a>
                </div>
            </div>
        </div>
        <div class=" col-12 col-md-4 px-4 py-3 p-md-5">
            <!------------- BOX PYROGRAVURE --------->
            <div class="row boxContact" title="Cliquer pour en apprendre plus...">
                <img src="../public/assets/img/machines/pyrogravure.jpg" alt="Pyrogravure" class="productImgWorking">
                <div class="col-12  text-center align-self-center py-3">
                    <a href="informations.html?workingInfo=2" class="stretched-link">
                        <h4>Pyrogravure</h4>
                    </a>
                </div>
            </div>
        </div>
        <div class=" col-12 col-md-4 px-4 py-3 p-md-5">
            <!------------- BOX TOURNAGE --------->
            <div class="row boxContact" title="Cliquer pour en apprendre plus...">
                <img src="../public/assets/img/machines/tournage.jpg" alt="Tournage sur bois" class="productImgWorking">
                <div class="col-12  text-center align-self-center py-3">
                    <a href="informations.html?workingInfo=3" class="stretched-link">
                        <h4>Tournage sur bois</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Découvrir le métier</h1>
        </div>
    </div>
    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4 ">
            <p>Le travail du bois est une passion qui m'anime depuis déjà de nombreuses années</p>
            <p>Découvrez comment je travaille</p>
        </div>
    </div>
    <div class="row py-4">
        <div class=" col-12 p-5">
            <!------------- BOX CATEGORY --------->
            <div class="row boxContact">
                <img src="../public/assets/img/icons/tournage_machinery_01.jpg" alt="<?= $title ?>" class="productImgLeft">
                <div class="col-12 col-md-6  text-center align-self-center py-3">
                    <a href="<?= $url ?>" class="stretched-link">
                        <h4><?= $title ?></h4>
                    </a>
                </div>
            </div>
        </div>
        <div class=" col-12 p-5">
            <!------------- BOX CATEGORY --------->
            <div class="row boxContact">
                <img src="../public/assets/img/icons/tournage_machinery_02.jpg" alt="<?= $title ?>" class="productImgLeft">
                <div class="col-12 col-md-6  text-center align-self-center py-3">
                    <a href="<?= $url ?>" class="stretched-link">
                        <h4><?= $title ?></h4>
                    </a>
                </div>
            </div>
        </div>
    </div>

</main>