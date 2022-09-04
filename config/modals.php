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
                    if(!empty($_SESSION['username'])){
                        ?>
                        <div class="col-12 text-center align-self-center">
                            <h4>Bonjour <?= $_SESSION['username'] ?></h4>
                        </div>
                        <div class="col-12 text-center align-self-center">
                            <a href="../controllers/logout.php" class="stretched-link">
                                <h4>Se déconnecter</h4>
                            </a>
                        </div>
                        <?php
                    }else{
                    ?>
                    <div id="btnInscriptionModal" class="col-6 text-center align-self-center p-3">
                        Inscription
                    </div>
                    <div id="btnConnexionModal" class="col-6 text-center align-self-center p-3 bigifyTextSelected">
                        Connexion
                        <a href="profil.html">?</a>
                    </div>
                    <div class="offset-1 col-10 border-2 border-secondary border-top py-3">
                        <div id="connectVueModal" class="row">
                            <div id="cartVueModal">
                                <div class="row pt-3">
                                    <div class="col-12 px-4 pt-2">
                                        Identifiant
                                    </div>
                                    <div class="col-12 px-4 pb-2">
                                        <input type="text" class="inputText">
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-12 px-4 pt-2">
                                        Mot de passe
                                    </div>
                                    <div class="col-12 px-4 pb-2">
                                        <input type="password" class="inputText">
                                    </div>
                                </div>
                            </div>
                            <div id="cartFooterVue" class="border-1 border-top p-3 mt-5">
                                <div class="row">
                                    <div class="col-12 text-end order-1">
                                        <button type="submit" class="btn btn-secondary">Se connecter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>