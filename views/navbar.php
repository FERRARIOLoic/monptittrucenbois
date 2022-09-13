<!------------- NAVBAR --------->
<header id="site-header">
    <nav id="navbar" class="fixed-top navbar navbar-expand-lg navbar-light shadow navbarImgBackground">
        <div class="container-fluid ">
            <div class="row navbar-collapse" id="navbarSupportedContent">
                <div class="col-2 d-md-none text-start">
                    <img src="../public/assets/img/icons/menuHamburger.svg" class="menuImg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" />
                </div>
                <div class="col-8 col-md-4 fs-6 titleSite text-center">
                    <a href="accueil.html">
                        <img class="navbarImgLogo" src="../public/assets/img/icons/logo.png" alt="Mon P'tit Truc En Bois">
                    </a>
                    <a href="accueil.html">
                        <strong>Mon P'tit Truc En Bois</strong>
                    </a>
                </div>
                <div class="col-2 col-md-1 order-md-2">
                    <div class="row text-end">
                        <div class=" col-6 col-md-6 order-md-2 text-end ">
                            <img id="btnModalSearch" type="button" class="searchImg" data-bs-toggle="modal" data-bs-target="#modalSearch" class="networkImg" src="../public/assets/img/icons/search.svg">
                        </div>
                        <div class=" col-6 col-md-6 order-md-2 text-end ">
                            <?php
                            if ($user_admin == 1 and isset($_SESSION['firstname'])) { ?>
                                <a href="administrateur.html"><img id="btnModalLogin" type="button" class="profileImg" src="../public/assets/img/icons/admin.svg" alt="Accéder au menu administrateur" title="Accéder au menu administrateur"></a>
                            <?php } elseif ($user_admin == 0 and isset($_SESSION['firstname'])) { ?>
                                <a href="profil.html"><img class="profileImg" src="../public/assets/img/icons/admin.svg" alt="Accéder au profil" title="Accéder au profil"></a>
                            <?php } else { ?>
                                <img id="btnModalLogin" type="button" class="profileImg" data-bs-toggle="modal" data-bs-target="#modalLogin" src="../public/assets/img/icons/user.svg" alt="Se connecter" title="Se connecter">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse col-6 col-md-6 text-md-center" id="navbarNavAltMarkup" id="fixBtn">
                    <div class="col-12 col-md-2 py-2">
                        <a href="actualites.html"><strong>Actualités</strong></a>
                    </div>
                    <?php
                    foreach ($categories_list as $category) :
                        // var_dump($categories_list);
                        // die;
                    ?>
                        <div class="col-12 col-md-2 py-2">
                            <a href="produits.html?category_id=<?= $category->id_product_category; ?>"><strong><?= $category->categories ?></strong></a>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-12 col-md-2 py-2">
                        <a href="contact.html"><strong>Contacts</strong></a>
                    </div>
                    <div class="col-12 col-md-2 py-2 border-2 border-top border-secondary d-md-none">
                        <a href="administrateur.html"><strong>Menu administrateur</strong></a>
                    </div>
                    <div class="col-12 col-md-2 py-2 d-md-none">
                        <a href="orders.html"><strong>Gestion des commandes</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>