<main class="container-fluid">
    <div class="row titlePage px-4">
        <div class=" col-12 col-md px-4 py-3 text-center">
            <h1>Mon P'tit Truc En Bois</h1>
        </div>
    </div>

    <div class="row descriptionPage">
        <div class="col-12 py-3 text-center align-self-center fs-4 ">
            <h3>Des idées originales pour des cadeaux de mariage, baptême, anniversaire, communion, retraite, Noël...</h3>
        </div>
        <div class="col-12 py-3 text-center align-self-center fs-4 ">
            Tous les produits sont fabriqués dans différentes essences de bois <br>Chêne, Frêne, Hêtre, Merisier...
        </div>
        <div class="col-12 py-3 text-center align-self-center fs-4 ">
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
                <div class="row boxContact">
                    <img class="productImgHome" src="../public/assets/img/icons/<?= $infoCategory->categories_name ?>.jpg" alt="<?= $infoCategory->categories_name ?>">
                    <div class="col-12  text-center align-self-center py-3">
                        <a href="produits.html?category_id=<?= $infoCategory->id_category; ?>" class="stretched-link">
                            <h4><?= $infoCategory->categories_name ?></h4>
                        </a>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>




    <div class="row mt-5 px-4">
        <div class="col-12 text-center boxContact py-4 align-self-center">
            <h2>Comment je travaille</h2>
        </div>
    </div>
    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-3 ">
            <p>Je travaille de différentes façons :</p>
        </div>
        <div class="col-12 text-center align-self-center fs-5 py-4">
            <p><strong>Le chantournage</strong></p>
            <p>Fait de découper une pièce de bois selon des profils complexes, généralement en courbes et contre-courbes
                <br>La technique du chantournage fait appel à plusieurs types d'outils, manuels ou électriques.
            </p>
        </div>
        <div class="col-12 text-center align-self-center fs-5 py-4">
            <p><strong>Le tournage sur bois</strong></p>
            <p>Utilisation d'un tour à bois et d'outils de coupe, employé pour créer des objets appellés "de révolution".
                <br>Beaucoup de formes, simples ou complexes, peuvent être réalisées en tournant le bois, telles que des bols, des vases, des bougeoirs, des pieds de table, certains instruments à vent (flûte, clarinette, hautbois...) ...
            </p>
        </div>
        <div class="col-12 text-center align-self-center fs-5 py-4">
            <p><strong>La pyrogravure</strong></p>
            <p>Technique de gravure consistant à dessiner ou imprimer un motif sur un objet en brûlant sa surface.
                <br>Comme pour la gravure, il désigne également la technique et le résultat obtenu.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4 px-4 py-3 p-md-5">
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
    </div>



    <div class="row mt-5 px-4">
        <div class="col-12 text-center boxContact py-4 align-self-center">
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
                    <a href="" class="stretched-link">
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
                    <a href="" class="stretched-link">
                        <h4>Tournage</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-4">
        <div class=" col-12 col-md-4 px-4 py-3 p-md-5">


        </div>
    </div>

</main>