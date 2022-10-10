<?php
// var_dump($_SESSION);die;
?>
<!------------- NAVBAR --------->
<header id="site-header">
    <nav id="navbar" class="fixed-top navbar navbar-expand-lg navbar-light shadow navbarImgBackground">
        <div class="container-fluid ">
            <div class="row navbar-collapse" id="navbarSupportedContent">
                <div class="col-2 d-lg-none text-start">
                    <img alt='Afficher le menu' src="../public/assets/img/icons/menuHamburger.svg" class="menuImg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" />
                </div>
                <div class="col-8 col-lg-3 text-center text-lg-start nav-link">
                    <a href="accueil.html">
                        <img class="navbarImgLogo" src="../public/assets/img/icons/logo.png" alt="Mon P'tit Truc En Bois">
                    </a>
                    <a href="accueil.html">
                        <span class='titleSite'>Mon P'tit Truc En Bois</span>
                    </a>
                </div>
                <div class="col-2 col-lg-1 order-lg-2">
                    <div class="row text-end">
                        <div class=" col-6 col-lg-6 order-lg-2 text-end align-self-center">
                            <img alt='Faire une recherche sur le site' id="btnModalSearch" type="button" class="searchImg" data-bs-toggle="modal" data-bs-target="#modalSearch" class="networkImg" src="../public/assets/img/icons/search.svg">
                        </div>
                        <div class=" col-6 col-lg-6 order-lg-2 text-end align-self-center">
                            <?php
                            if (isset($_SESSION['user'])) {
                                // var_dump($_SERVER['REQUEST_URI']); die;
                                if ($_SESSION['user']->users_admin == 1 and ($_SERVER['REQUEST_URI'] != "/profil.html" and $_SERVER['REQUEST_URI'] != "/administrateur.html")) { ?>
                                    <a href="administrateur.html"><img id="btnModalLogin" type="button" class="profileImg" src="../public/assets/img/icons/admin.svg" alt="Menu administrateur" title="Menu administrateur"></a>
                                <?php } elseif ($_SESSION['admin'] != 1 and $_SERVER['REQUEST_URI'] != "/profil.html") { ?>
                                    <a href="profil.html"><img class="profileImg" src="../public/assets/img/icons/profile.svg" alt="Accéder au profil" title="Accéder au profil"></a>
                                <?php } elseif ($_SESSION['admin'] != 1 and $_SERVER['REQUEST_URI'] = "/profil.html") { ?>
                                    <img id="btnModalLogin" type="button" class="profileImg" data-bs-toggle="modal" data-bs-target="#modalLogin" src="../public/assets/img/icons/logout.svg" alt="Déconnexion" title="Déconnexion">
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
                <div class="collapse navbar-collapse col-6 col-lg-7 text-lg-center" id="navbarNavAltMarkup" id="fixBtn">
                    <div class="col-12 offset-lg-2 col-lg-2 py-2">
                        <a class="nav-link" href="actualites.html">Actualités</a>
                    </div>
                    <div class="col-12 col-lg-2 py-2 nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catégories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($categories_list as $category) :
                            ?>
                                <div class="col-12 py-2">
                                    <a class="nav-link" href="produits.html?category_id=<?= $category->id_category; ?>"><?= $category->categories_name ?></a>
                                </div>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-2 py-2">
                        <a class="nav-link" href="contact.html">Contacts</a>
                    </div>
                    <div class="col-12 col-lg-2 py-2">
                        <a class="nav-link" href="a_propos.html">&Agrave; propos</a>
                    </div>
                    <div class="col-12 col-lg-2 py-2 nav-item dropdown">
                        <?php if (($_SESSION['admin'] ?? '') == 1) { ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Administrateur
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="col-12 ">
                                    <span class='nav-link boxSubCategoryWhite'><a href="profil.html">Mon profil</a></span>
                                </div>
                                <div class="col-12 ">
                                    <span class='nav-link boxSubCategoryWhite'>Commandes</span>
                                    <a href="administrateur.html?display=ordersPending">Payées</a>
                                    <br><a href="administrateur.html?display=ordersShip">Attente de livraison</a>
                                </div>
                            </ul>
                        <?php } elseif (isset($_SESSION['user'])) { ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="col-12 ">
                                    <span class='nav-link boxSubCategoryWhite'><a href="profil.html">Mon profil</a></span>
                                </div>
                                <div class="col-12 ">
                                    <span class='nav-link boxSubCategoryWhite'><a href="profil.html">Mes commandes</a></span>
                                </div>
                                <div class="offset-10 col-2 align-self-center pt-2">
                                    <img id="btnModalLogin" type="button" class="profileImg" data-bs-toggle="modal" data-bs-target="#modalLogin" src="../public/assets/img/icons/logout.svg" alt="Déconnexion" title="Déconnexion">
                                </div>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>