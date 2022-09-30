<?php
// var_dump($_SESSION);die;
?>
<!------------- NAVBAR --------->
<header id="site-header">
    <nav id="navbar" class="fixed-top navbar navbar-expand-lg navbar-light shadow navbarImgBackground">
        <div class="container-fluid ">
            <div class="row navbar-collapse" id="navbarSupportedContent">
                <div class="col-2 d-md-none text-start">
                    <img src="../public/assets/img/icons/menuHamburger.svg" class="menuImg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" />
                </div>
                <div class="col-8 col-md-3 fs-6 titleSite text-center text-md-start nav-link">
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
                            if (isset($_SESSION['user'])) {
                                // var_dump($_SERVER['REQUEST_URI']); die;
                                if ($_SESSION['user']->users_admin == 1 and ($_SERVER['REQUEST_URI'] != "/profil.html" and $_SERVER['REQUEST_URI'] != "/administrateur.html")) { ?>
                                    <a href="administrateur.html"><img id="btnModalLogin" type="button" class="profileImg" src="../public/assets/img/icons/admin.svg" alt="Menu administrateur" title="Menu administrateur"></a>
                                <?php } elseif ($_SESSION['admin'] != 1 and $_SERVER['REQUEST_URI'] != "/profil.html") { ?>
                                    <a href="profil.html"><img class="profileImg" src="../public/assets/img/icons/profile.svg" alt="Accéder au profil" title="Accéder au profil"></a>
                                <?php } elseif ($_SESSION['user']->users_admin == 1 and ($_SERVER['REQUEST_URI'] == "/profil.html" or $_SERVER['REQUEST_URI'] == "/administrateur.html")) { ?>
                                    <img id="btnModalLogin" type="button" class="profileImg" data-bs-toggle="modal" data-bs-target="#modalLogin" src="../public/assets/img/icons/logout.svg" alt="Déconnexion" title="Déconnexion">
                                <?php }
                            } else {
                                ?>
                                <img id="btnModalLogin" type="button" class="profileImg" data-bs-toggle="modal" data-bs-target="#modalLogin" src="../public/assets/img/icons/login.svg" alt="Connexion / inscription" title="Connexion / Inscription">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse col-6 col-md-7 text-md-center" id="navbarNavAltMarkup" id="fixBtn">
                    <div class="col-12 col-md-2 py-2">
                        <a class="nav-link" href="actualites.html"><strong>Actualités</strong></a>
                    </div>
                    <?php
                    foreach ($categories_list as $category) :
                    ?>
                        <div class="col-12 col-md-2 py-2">
                            <a class="nav-link" href="produits.html?category_id=<?= $category->id_category; ?>"><strong><?= $category->categories_name ?></strong></a>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-12 col-md-2 py-2">
                        <a class="nav-link" href="contact.html"><strong>Contacts</strong></a>
                    </div>
                    <div class="col-12 col-md-2 py-2 border-2 border-top border-secondary d-md-none">
                        <a class="nav-link" href="administrateur.html"><strong>Menu administrateur</strong></a>
                    </div>
                    <div class="col-12 col-md-2 py-2 d-md-none">
                        <a class="nav-link" href="orders.html"><strong>Gestion des commandes</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>