<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="offset-md-2 col-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>
                <div class="col-12 col-md-3">
                    <div class="row mt-5">
                        <div class="col-12 offset-md-1 col-md-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row boxContact py-3">
                                        <div class="col-12 py-2 text-center">
                                            <h3>Utilisateurs</h3>
                                        </div>
                                        <div class="col-12 p-2 pt-3 text-center border-top border-1 border-secondary">
                                            <a href="administrateur_liste_utilisateurs">Liste des utilisateurs</a>
                                        </div>
                                        <div class="col-12 p-2 text-center">
                                            <a href="administrateur_nouvel_utilisateur">Créer un utilisateur</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="row mt-5">
                        <div class="col-12 offset-md-1 col-md-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row boxContact py-3">
                                        <div class="col-12 py-2 text-center">
                                            <h3>Commandes</h3>
                                        </div>
                                        <div class="col-12 p-2 pt-3 text-center border-top border-1 border-secondary">
                                            <a href="administrateur_nouvelles_commandes">En cours</a>
                                        </div>

                                        <div class="col-12 p-2 text-center">
                                            <a href="administrateur_commandes_attente">&Agrave; fabriquer</a>
                                        </div>

                                        <div class="col-12 p-2 text-center">
                                            <a href="administrateur_commandes_livraison">En attente de livraison</a>
                                        </div>

                                        <div class="col-12 p-2 text-center">
                                            <a href="administrateur_commandes_finies">Terminées</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>