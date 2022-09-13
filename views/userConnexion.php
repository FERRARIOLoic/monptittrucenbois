<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Inscription / Connexion</h1>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-12 offset-md-1 col-md-4 boxConnect">
            <div class="row">
                <div class="col-12 fs-2">
                    Inscription
                </div>
                <div class="col-12">
                    <?= $errorText->text_error; ?>
                </div>
                <div class="col-12">
                    <form action="creer_utilisateur.html" method="post" novalidate>
                        <div id="cartVueModal">
                            <div class="row pt-3">
                                <div class="col-12 px-4 pt-2">
                                    <div class="form-floating mb-4">
                                        <input type="email" autocomplete="email" value="<?=$email ?? ''?>"
                                            class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>"
                                            id="email" name="email" required placeholder="dupondjean@gmail.com" />
                                        <label for="email" class="form-label">Email*</label>
                                    </div>
                                </div>
                                <div class="col-12 px-4 pt-2">
                                    <div class="form-floating mb-4">
                                        <input type="password" autocomplete="password" value="<?=$password ?? ''?>"
                                            class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>"
                                            id="password" name="password" required placeholder="dupondjean@gmail.com" />
                                        <label for="password" class="form-label">Taper le mot de passe*</label>
                                    </div>
                                </div>
                                <div class="col-12 px-4 pt-2">
                                    <div class="form-floating mb-4">
                                        <input type="password" autocomplete="password_verif" value="<?=$password_verif ?? ''?>"
                                            class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>"
                                            id="password_verif" name="password_verif" required placeholder="dupondjean@gmail.com" />
                                        <label for="password_verif" class="form-label">Retaper le mot de passe*</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="cartFooterVue" class="border-1 border-top p-3 mt-5">
                            <div class="row">
                                <div class="col-12 text-end order-1">
                                    <button type="submit" class="btn btn-secondary">Valider l'inscription</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 offset-md-2 col-md-4 boxConnect">
            <div class="row">
                <div class="col-12 fs-2">
                    Connexion
                </div>
                <div class="col-12">
                    <div id="cartVueModal">
                        <div class="row pt-3">
                            <div class="col-12 px-4 pb-2">
                                <div class="form-floating mb-4">
                                    <input type="email" autocomplete="email" value="<?=$email ?? ''?>"
                                        class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>"
                                        id="email" name="email" required placeholder="dupondjean@gmail.com" />
                                    <label for="email" class="form-label">Email*</label>
                                </div>
                            </div>
                            <div class="col-12 px-4 pt-2">
                                <div class="form-floating mb-4">
                                    <input type="password" autocomplete="password" value="<?=$password ?? ''?>"
                                        class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>"
                                        id="password" name="password" required placeholder="dupondjean@gmail.com" />
                                    <label for="password" class="form-label">Mot de passe*</label>
                                </div>
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
        </div>
    </div>






</main>