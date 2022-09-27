<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1><?= $pageTitle; ?></h1>
        </div>
    </div>
    <script type="text/javascript">
        function toggle_text(id) {
            var span = document.getElementById(id);
            if (span.style.display == "none") {
                span.style.display = "inline";
            } else {
                span.style.display = "none";
            }
        }
    </script>
    <div class="row py-4">
        <div class=" col-12 col-md-3 px-4 py-3 p-md-5">
            <!------------- BOX CATEGORY --------->
            <div id="admin_0" class="row boxContact" onclick="toggle_text(0);">

                <div class="col-12  text-center align-self-center py-3">
                    <h4>Utilisateurs</h4><i class="fa-solid fa-sort-down"></i>
                </div>
                <span id="0" style="display:none;">

                    <div class="row border-1 border-top">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=users">Liste des utilisateurs</a></div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=usersNew">Nouveaux utilisateurs</a></div>
                    </div>
                </span>
            </div>
        </div>
        <div class=" col-12 col-md-3 px-4 py-3 p-md-5">
            <!------------- BOX CATEGORY --------->
            <div id="admin_1" class="row boxContact" onclick="toggle_text(1);">

                <div class="col-12  text-center align-self-center py-3">
                    <h4>Commandes</h4>
                </div>
                <span id="1" style="display:none;">

                    <div class="row border-1 border-top">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=ordersNew">Nouvelles commandes</a></div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=ordersPending">En cours de traitement</a></div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=ordersShip">En attente de livraison</a></div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=ordersEnded">Commandes terminées</a></div>
                    </div>
                </span>
            </div>
        </div>
        <div class=" col-12 col-md-3 px-4 py-3 p-md-5">
            <!------------- BOX CATEGORY --------->
            <div id="admin_2" class="row boxContact" onclick="toggle_text(2);">

                <div class="col-12  text-center align-self-center py-3">
                    <h4>Evénements</h4>
                </div>
                <span id="2" style="display:none;">

                    <div class="row border-1 border-top">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=eventsCreate">Créer un évènement</a></div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=eventsPending">&Eacute;vènements en cours</a></div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=eventsEnded">&Eacute;vènements terminés</a></div>
                    </div>
                </span>
            </div>
        </div>
        <div class=" col-12 col-md-3 px-4 py-3 p-md-5">
            <!------------- BOX CATEGORY --------->
            <div id="admin_3" class="row boxContact" onclick="toggle_text(3);">

                <div class="col-12  text-center align-self-center py-3">
                    <h4>Produits</h4>
                </div>
                <span id="3" style="display:none;">

                    <div class="row border-1 border-top">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=productsCreate">Créer un produit</a></div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=products">Gérer les produits</a></div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=productsModify">Modifier un produit</a></div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=dataModify">Modifier les informations</a></div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 py-2"><a href="administrateur.html?display=categoryCreateModify">Modifier les catégories</a></div>
                    </div>
                </span>
            </div>
        </div>
    </div>

</main>






<!-- <main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Page administrateur</h1>
        </div>
    </div>
    <script type="text/javascript">
        function toggle_text(id) {
            var span = document.getElementById(id);
            if (span.style.display == "none") {
                span.style.display = "inline";
            } else {
                span.style.display = "none";
            }
        }
    </script>
    <div class="row py-4">
        < ?php
        foreach ($adminListVue as $id => $adminCategory) { ?>
            <div class=" col-12 col-md-3 px-4 py-3 p-md-5">
                <div id="admin_<?= $id ?>" class="row boxContact" onclick="toggle_text(<?= $id ?>);">

                    <div class="col-12  text-center align-self-center py-3">
                        <h4><?= $adminCategory['displayName'] ?></h4>
                    </div>
                    <span id="<?= $id ?>" style="display:none;">
                        <?php
                        switch ($adminCategory) {
                            case $adminCategory:
                                include(__DIR__ . '/../views/templates/' . $adminCategory['url']);
                                break;
                        }
                        ?>
                    </span>
                </div>
            </div>
        < ?php }
        ?>
    </div>

</main> -->