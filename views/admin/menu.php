<div class="row">
    <!------------- MENU ADMINISTRATEUR --------->
    <div class="col-2 boxMenuAdmin">
        <div class="row">
            <div class="col-12 py-3 text-center border-bottom border-2">
                <a href='administrateur.html'>
                    <h5 class='text-white'>Menu administrateur</h5>
                </a>
            </div>
            <div class=" col-11 py-2 pt-3">
                <!------------- BOX CATEGORY --------->
                <div id="admin_0" class="row boxMenuAdminSub" onclick="toggle_text(0);">
                    <div class="col-12 align-self-center py-2">
                        <h5>Utilisateurs</h5><i class="fa-solid fa-sort-down"></i>
                    </div>
                    <span id="0" style="display:none;">
                        <div class="row border-1 border-top border-secondary">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=usersList">Liste des utilisateurs</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=usersNew">Nouveaux utilisateurs</a></div>
                        </div>
                    </span>
                </div>
            </div>
            <div class=" col-11 py-2">
                <!------------- BOX CATEGORY --------->
                <div id="admin_1" class="row boxMenuAdminSub" onclick="toggle_text(1);">
                    <div class="col-12 align-self-center py-2">
                        <h5>Commandes</h5>
                    </div>
                    <span id="1" style="display:none;">
                        <div class="row border-1 border-top border-secondary">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=ordersNew">Nouvelles commandes</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=ordersPending">En cours de traitement</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=ordersShip">En attente de livraison</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=ordersEnded">Commandes terminées</a></div>
                        </div>
                    </span>
                </div>
            </div>
            <div class=" col-11 py-2">
                <!------------- BOX CATEGORY --------->
                <div id="admin_2" class="row boxMenuAdminSub" onclick="toggle_text(2);">
                    <div class="col-12 align-self-center py-2">
                        <h5>Evénements</h5>
                    </div>
                    <span id="2" style="display:none;">
                        <div class="row border-1 border-top border-secondary">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=eventsCreate">Créer un évènement</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=eventsPending">&Eacute;vènements en cours</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=eventsEnded">&Eacute;vènements terminés</a></div>
                        </div>
                    </span>
                </div>
            </div>
            <div class=" col-11 py-2">
                <!------------- BOX CATEGORY --------->
                <div id="admin_3" class="row boxMenuAdminSub" onclick="toggle_text(3);">
                    <div class="col-12 align-self-center py-2">
                        <h5>Produits</h5>
                    </div>
                    <span id="3" style="display:none;">
                        <div class="row border-1 border-top border-secondary">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=productsCreate">Créer un produit</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=products">Gérer les produits</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=productsModify">Modifier un produit</a></div>
                        </div>
                    </span>
                </div>
            </div>


            
            <div class=" col-11 py-2">
                <!------------- BOX CATEGORY --------->
                <div id="admin_3" class="row boxMenuAdminSub" onclick="toggle_text(4);">
                    <div class="col-12 align-self-center py-2">
                        <h5>Informations</h5>
                    </div>
                    <span id="4" style="display:none;">
                        <div class="row border-1 border-top border-secondary">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=woods">Bois</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=carriers">Transporteurs</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=categoryCreateModify">Catégories</a></div>
                        </div>
                    </span>
                </div>
            </div>
            <div class=" col-11 pt-5">
                <a href='profil.html' class='text-white'>Mon profil</a>
            </div>
            <div class=" col-11 pt-5">
                <a href='accueil.html' class='text-white'>Retourner au site</a>
            </div>
        </div>
    </div>
    <!------------- MENU ADMINISTRATEUR --------->
    <div class="col-10">
        <div class="row">
            <div class="col-12 py-4 text-center">
                <h1><?= $pageTitle; ?></h1>
            </div>
