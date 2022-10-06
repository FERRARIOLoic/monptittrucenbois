<!------------- MODAL SEARCH --------->
<div class="modal fade" id="modalSearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="CartVueTitle" class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
            </div>
            <div id="cartVueModal">
            </div>
            <div id="cartFooterPrice" class="modal-footer">
            </div>
            <div id="cartFooterVue" class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!------------- MODAL LOGIN --------->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content navbarImgBackground">
            <div id="cartVueModal">
                <div class="row mt-2">
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <div class="col-12 text-center align-self-center py-5">
                            <h4>Confirmer votre départ</h4>
                        </div>
                        <div class="col-12 text-center align-self-center py-5">
                            <a href="deconnexion.html" class="stretched-link">
                                <button class="btn btnValid">
                                    <h4>Se déconnecter</h4>
                                </button>
                            </a>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div id="btnInscriptionModal" class="col-6 text-center align-self-center p-3">
                            Inscription
                        </div>
                        <div id="btnConnexionModal" class="col-6 text-center align-self-center p-3 bigifyTextSelected">
                            Connexion
                        </div>
                        <div class="offset-1 col-10 border-2 border-secondary border-top py-3">
                            <div id="connectVueModal">
                                <form class="mb-5" method="POST" action="connexion.html">

                                    <div class="error"><?= $errors['global'] ?? '' ?></div>

                                    <div class="form-floating">
                                        <input type="email" autocomplete="email" class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>" id="email" name="email" required placeholder="email" />
                                        <label for="email" class="form-label px-4 boxContactTitle">Adresse mail*</label>
                                    </div>

                                    <div class="form-floating mb-5">
                                        <input type="password" value="" class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>" id="password" required name="password" placeholder="*****" />
                                        <label for="password" class="form-label px-4 boxContactTitle">Mot de passe*</label>
                                    </div>
                                    <div class="col-12 text-center mb-5">
                                        <button class="btn btnValid" type="submit"><strong>Connexion</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>