<style>
    #desktop {
        display: block;
    }

    #mobile {
        display: none;
    }

    @media screen and (max-width: 576px) {
        #desktop {
            display: none;
        }

        #mobile {
            display: block;
        }
    }
</style>

<!------------- DESKTOP ADMIN MENU --------->
<div id='desktop' class="row">
    <!------------- MENU ADMINISTRATEUR --------->
    <div class="col-2 boxMenuAdmin">
        <div class="row">
            <!-------------
            <div class="col-12 py-3 text-center border-bottom border-2">
                <a href='administrateur.html'>
                    <h5 class='text-white'>Menu administrateur</h5>
                </a>
            </div>
            --------->
            <div class=" col-11 py-2 pt-3">
                <!------------- BOX USERS --------->
                <div id="admin_0" class="row boxMenuAdminSub" onclick="toggle_text('users_desktop');">
                    <div class="col-12 align-self-center py-2">
                        <h5>Utilisateurs</h5><i class="fa-solid fa-sort-down"></i>
                    </div>
                    <span id="users_desktop" style="display:none;">
                        <div class="row border-1 border-top border-secondary">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=usersList">Liste des utilisateurs</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=usersNew">Créer un utilisateur</a></div>
                        </div>
                    </span>
                </div>
            </div>
            <div class=" col-11 py-2">
                <!------------- BOX ORDERS --------->
                <div id="admin_1" class="row boxMenuAdminSub" onclick="toggle_text('orders_desktop');">
                    <div class="col-12 align-self-center py-2">
                        <h5>Commandes</h5>
                    </div>
                    <span id="orders_desktop" style="display:none;">
                        <div class="row border-1 border-top border-secondary">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=ordersNew">En cours</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=ordersPending">Payées</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=ordersShip">En attente de livraison</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=ordersEnded">Terminées</a></div>
                        </div>
                    </span>
                </div>
            </div>
            <div class=" col-11 py-2">
                <!------------- BOX EVENTS --------->
                <div id="admin_2" class="row boxMenuAdminSub" onclick="toggle_text('events_desktop');">
                    <div class="col-12 align-self-center py-2">
                        <h5>Evénements</h5>
                    </div>
                    <span id="events_desktop" style="display:none;">
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
                <!------------- BOX PRODUCTS --------->
                <div id="admin_3" class="row boxMenuAdminSub" onclick="toggle_text('products_desktop');">
                    <div class="col-12 align-self-center py-2">
                        <h5>Produits</h5>
                    </div>
                    <span id="products_desktop" style="display:none;">
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
                <!------------- BOX COMMENTS --------->
                <div id="admin_3" class="row boxMenuAdminSub" onclick="toggle_text('comments_desktop');">
                    <div class="col-12 align-self-center py-2">
                        <h5>Commentaires</h5>
                    </div>
                    <span id="comments_desktop" style="display:none;">
                        <div class="row border-1 border-top border-secondary">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=productsCreate">Nouveaux</a></div>
                        </div>
                        <div class="row">
                            <div class="col-12 px-2 py-2"><a href="administrateur.html?display=productsModify">Répondus</a></div>
                        </div>
                    </span>
                </div>
            </div>

            <div class=" col-11 py-2">
                <!------------- BOX INFOS --------->
                <div id="admin_3" class="row boxMenuAdminSub" onclick="toggle_text('infos_desktop');">
                    <div class="col-12 align-self-center py-2">
                        <h5>Informations</h5>
                    </div>
                    <span id="infos_desktop" style="display:none;">
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
                <a href='profil.html' class='text-white'>Voir mon profil</a>
            </div>
            <div class=" col-11 pt-5">
                <a href='accueil.html' class='text-white'>Retourner au site</a>
            </div>
        </div>
    </div>
</div>



<!------------- MOBILE ADMIN MENU --------->
<div id='mobile' class="row">
    <!------------- MENU ADMINISTRATEUR --------->
    <div class="col-12 boxMenuAdmin">
        <div class="row">
            <div class=" col-2">
                <!------------- BOX USERS --------->
                <div id="admin_0" class="row boxMenuAdminSubDown" onclick="toggle_text('users');">
                    <div class="col-12 text-center align-self-center py-2">
                        <lord-icon src="https://cdn.lordicon.com/bhfjfgqz.json" trigger="hover" colors="primary:#663300">
                        </lord-icon>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <!------------- BOX ORDERS --------->
                <div id="admin_1" class="row boxMenuAdminSubDown" onclick="toggle_text('orders');">
                    <div class="col-12 text-center align-self-center py-2">
                        <lord-icon src="https://cdn.lordicon.com/ifqmqwui.json" trigger="hover" colors="primary:#663300">
                        </lord-icon>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <!------------- BOX EVENTS --------->
                <div id="admin_2" class="row boxMenuAdminSubDown" onclick="toggle_text('events');">
                    <div class="col-12 text-center align-self-center py-2">
                        <lord-icon src="https://cdn.lordicon.com/isugonwi.json" trigger="hover" colors="primary:#663300">
                        </lord-icon>
                    </div>
                </div>
            </div>

            <div class="col-2">
                <!------------- BOX PRODUCTS --------->
                <div id="admin_3" class="row boxMenuAdminSubDown" onclick="toggle_text('products');">
                    <div class="col-12 text-center align-self-center py-2">
                        <lord-icon src="https://cdn.lordicon.com/kipaqhoz.json" trigger="morph" colors="primary:#663300">
                        </lord-icon>
                    </div>
                </div>
            </div>

            <div class="col-2">
                <!------------- BOX COMMENTS --------->
                <div id="admin_3" class="row boxMenuAdminSubDown" onclick="toggle_text('comments');">
                    <div class="col-12 text-center align-self-center py-2">
                        <lord-icon src="https://cdn.lordicon.com/hpivxauj.json" trigger="hover" colors="primary:#663300">
                        </lord-icon>
                    </div>
                </div>
            </div>

            <div class="col-2">
                <!------------- BOX INFOS --------->
                <div id="admin_3" class="row boxMenuAdminSubDown" onclick="toggle_text('infos');">
                    <div class="col-12 text-center align-self-center py-2">
                        <lord-icon src="https://cdn.lordicon.com/ynwbvguu.json" trigger="hover" colors="primary:#663300">
                        </lord-icon>
                    </div>
                </div>
            </div>
            <div class="col-12 boxMenuAdminSubDown">

                <!------------- BOX USERS --------->
                    <span id="users" style="display:none;">
                        <div class="row text-center border-1 border-top border-secondary">
                            <div class="col-6 px-2 py-2">
                                <a href="administrateur.html?display=usersList">Liste</a>
                            </div>
                            <div class="col-6 px-2 py-2">
                                <a href="administrateur.html?display=usersNew">Créer </a>
                            </div>
                        </div>
                    </span>
                <!------------- BOX ORDERS --------->
                <span id="orders" style="display:none;">
                    <div class="row text-center border-1 border-top border-secondary">
                        <div class="col-3 px-2 py-2">
                            <a href="administrateur.html?display=ordersNew">En cours</a>
                        </div>
                        <div class="col-3 px-2 py-2">
                            <a href="administrateur.html?display=ordersPending">Payées</a>
                        </div>
                        <div class="col-3 px-2 py-2">
                            <a href="administrateur.html?display=ordersShip">En attente</a>
                        </div>
                        <div class="col-3 px-2 py-2">
                            <a href="administrateur.html?display=ordersEnded">Terminées</a>
                        </div>
                    </div>
                </span>
                <!------------- EVENTS --------->
                <span id="events" style="display:none;">
                    <div class="row text-center border-1 border-top border-secondary">
                        <div class="col-4 px-2 py-2">
                            <a href="administrateur.html?display=eventsCreate">Créer</a>
                        </div>
                        <div class="col-4 px-2 py-2">
                            <a href="administrateur.html?display=eventsPending">En cours</a>
                        </div>
                        <div class="col-4 px-2 py-2">
                            <a href="administrateur.html?display=eventsEnded">Terminés</a>
                        </div>
                    </div>
                </span>
                <!------------- BOX PRODUCTS --------->
                <span id="products" style="display:none;">
                    <div class="row text-center border-1 border-top border-secondary">
                        <div class="col-4 px-2 py-2">
                            <a href="administrateur.html?display=productsCreate">Créer</a>
                        </div>
                        <div class="col-4 px-2 py-2">
                            <a href="administrateur.html?display=products">Liste</a>
                        </div>
                        <div class="col-4 px-2 py-2">
                            <a href="administrateur.html?display=productsModify">Modifier</a>
                        </div>
                    </div>
                </span>
                <!------------- BOX COMMENTS --------->
                <span id="comments" style="display:none;">
                    <div class="row text-center border-1 border-top border-secondary">
                        <div class="col-6 px-2 py-2">
                            <a href="administrateur.html?display=productsCreate">Nouveaux</a>
                        </div>
                        <div class="col-6 px-2 py-2">
                            <a href="administrateur.html?display=productsModify">Répondus</a>
                        </div>
                    </div>
                </span>
                <!------------- BOX INFOS --------->
                <span id="infos" style="display:none;">
                    <div class="row border-1 text-center border-top border-secondary">
                        <div class="col-4 px-2 py-2">
                            <a href="administrateur.html?display=woods">Bois</a>
                        </div>
                        <div class="col-4 px-2 py-2">
                            <a href="administrateur.html?display=carriers">Transporteurs</a>
                        </div>
                        <div class="col-4 px-2 py-2">
                            <a href="administrateur.html?display=categoryCreateModify">Catégories</a>
                        </div>
                    </div>
                </span>
            </div>
            <div class=" col-6 text-center">
                <a href='profil.html' class='text-white'>Voir mon profil</a>
            </div>
            <div class=" col-6 text-center">
                <a href='accueil.html' class='text-white'>Retourner au site</a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.lordicon.com/pzdvqjsp.js"></script>