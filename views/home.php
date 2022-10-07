<main class="container-fluid">
    <div class="row titlePage pt-5 px-4">
        <div class=" col-12 offset-md-3 col-md-6 px-4 py-3 text-center border-bottom border-1 titleText fs-1">
            <h1>Mon P'tit Truc En Bois</h1>
        </div>
    </div>

    <div class="row descriptionPage">
        <div class="col-12 py-3 text-center align-self-center ">
            Des idées originales pour des cadeaux de mariage, baptême, anniversaire, communion, retraite, Noël...
        </div>
        <div class="col-12 py-3 text-center align-self-center ">
            Tous les produits sont fabriqués dans différentes essences de bois <br>Chêne, Frêne, Hêtre, Merisier...
        </div>
        <div class="col-12 py-3 text-center align-self-center ">
            Beaucoup de produits sont personnalisables selon vos envies (forme, décoration, couleurs peintes, prénoms...)
            <br>Si une personnalisation du produit est possible, n'hésitez à me demander les possibilités
            <br>Laissez libre court à votre imagination !!!
        </div>
    </div>

    <div class="row py-4">
        <?php
        foreach ($categories_list as $infoCategory) { ?>
            <div class=" col-12 col-md px-4 py-3 p-md-5">
                <!------------- BOX CATEGORY --------->
                <div class="row">
                    <img class="productImgHome" src="../public/assets/img/icons/<?= $infoCategory->categories_name ?>.jpg" alt="<?= $infoCategory->categories_name ?>">
                    <div class="col-12  text-center align-self-center py-3 boxSubCategoryWhite">
                        <a href="produits.html?category_id=<?= $infoCategory->id_category; ?>">
                            <h4><?= $infoCategory->categories_name ?></h4>
                        </a>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>




    <div class="row titlePage pt-3 px-4">
        <div class=" col-12 offset-md-3 col-md-6 px-4 py-3 text-center boxSubCategoryWhite">
            <h2>Comment je travaille</h2>
        </div>
    </div>
    <!------------- CHANTOURNAGE --------->
    <div class="row descriptionPage pt-4">
        <div class="order-2 order-md-1 col-12 offset-md-1 col-md-3 text-end">
            <img src="../public/assets/img/machines/chantournage.jpg" alt="Chantournage" class="productImgWorking">
        </div>
        <div class="order-1 order-md-2 col-12 col-md-8">
            <div class="row">
                <div class="col-12 col-md-10 fs-5 pt-1 titleSite fs-1">
                    <strong>Le chantournage</strong>
                </div>
                <div class="col-12 col-md-10 pt-3">
                    <p>Fait de découper une pièce de bois selon des profils complexes, généralement en courbes et contre-courbes
                        <br>La technique du chantournage fait appel à plusieurs types d'outils, manuels ou électriques.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!------------- TORNAGE SUR BOIS --------->
    <div class="row descriptionPage pt-2">
        <div class="order-2 order-md-1 col-12 offset-md-1 col-md-7">
            <div class="row ">
                <div class="col-12 offset-md-1 col-md-11 fs-5 pt-1 text-end titleSite fs-1">
                    <strong>Le tournage sur bois</strong>
                </div>
                <div class="col-12 offset-md-1 col-md-11 pt-3 text-end">
                    Utilisation d'un tour à bois et d'outils de coupe, employés pour créer des objets appellés "de révolution"
                </div>
                <div class="col-12 offset-md-1 col-md-11 text-end">
                    Beaucoup de formes, simples ou complexes, peuvent être réalisées, telles que des bols, des vases, des bougeoirs, des pieds de table, certains instruments à vent (flûte, clarinette, hautbois...) ...
                </div>
            </div>
        </div>
        <div class="order-2 order-md-1 col-12 col-md-3 text-start">
            <img src="../public/assets/img/machines/tournage.jpg" alt="Tournage sur bois" class="productImgWorking">
        </div>
    </div>
    <!------------- PYROGRAVURE --------->
    <div class="row descriptionPage pt-4">
        <div class="order-2 order-md-1 col-12 offset-md-1 col-md-3 text-end">
            <img src="../public/assets/img/machines/pyrogravure.jpg" alt="Pyrogravure" class="productImgWorking">
        </div>
        <div class="order-1 order-md-2 col-12 col-md-8">
            <div class="row">
                <div class="col-12 col-md-10 fs-5 pt-1 titleSite fs-1">
                    <strong>La pyrogravure</strong>
                </div>
                <div class="col-12 col-md-10 pt-3">
                    <p>Technique de gravure consistant à dessiner ou imprimer un motif sur un objet en brûlant sa surface
                        <br>Comme pour la gravure, il désigne également la technique et le résultat obtenu
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row titlePage pt-3 px-4">
        <div class=" col-12 offset-md-3 col-md-6 px-4 py-3 text-center boxSubCategoryWhite">
            <h2>Découvrir le métier</h2>
        </div>
    </div>
    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-5 ">
            <p>Le travail du bois est une passion qui m'anime depuis déjà de nombreuses années</p>
            <p>Découvrez comment je travaille</p>
        </div>
    </div>
    <div class="row py-4">
        <div class=" col-12 p-5">
            <!------------- BOX CATEGORY --------->
            <div class="row boxContact">
                <img src="../public/assets/img/icons/tournage_machinery_01.jpg" alt="Tournage" class="productImgLeft">
                <div class="col-12 col-md-6  text-center align-self-center py-3">
                    <a href="">
                        <h4>Tournage sur bois</h4>
                    </a>
                </div>
            </div>
        </div>
        <div class=" col-12 p-5">
            <!------------- BOX CATEGORY --------->
            <div class="row boxContact">
                <img src="../public/assets/img/icons/tournage_machinery_02.jpg" alt="Tournage" class="productImgLeft">
                <div class="col-12 col-md-6  text-center align-self-center py-3">
                    <a href="">
                        <h4>Tournage</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>

</main>