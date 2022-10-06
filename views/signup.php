<main class='container-fluid text-center'>
    <div class="row titlePage">
        <div class="col-12 py-3">
            <h1>Inscription</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 boxConnexion text-center">
            <div class="row">
                <div class="col-12 py-4 mb-4 boxContact">

                    <form class="row" method="POST" action="inscription.html">
                        <div class="col-12 <?= (isset($errors['email']) or isset($errors['password']) or isset($errors['password_verif']))  ? 'errorForm errorBoxCenter' : '' ?>">
                            <?= (isset($errors['email']) or isset($errors['password']) or isset($errors['password_verif']))  ? "Erreur lors de l'inscription" : '' ?>
                        </div>

                        <div class=" col-12 form-floating mb-4">
                            <input type="email" autocomplete="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value='<?= $email??'' ?>' placeholder="dupondjean@gmail.com" required />
                            <label for="email" class="form-label px-4 boxContactTitle">Adresse mail <span class='text-danger fw-bold'>*</span></label>
                            <div class="<?= isset($errors['email']) ? 'errorForm errorBoxDown' : ''; ?>"><?= $errors['email'] ?? '' ?></div>
                        </div>

                        <div class=" col-12 form-floating mb-4">
                            <input type="password" autocomplete="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" required name="password" placeholder="password" />
                            <label for="password" class="form-label px-4 boxContactTitle">Mot de passe <span class='text-danger fw-bold'>*</span></label>
                            <div class="<?= isset($errors['password']) ? 'errorForm errorBoxDown' : ''; ?>"><?= $errors['password'] ?? '' ?></div>
                        </div>

                        <div class=" col-12 form-floating">
                            <input type="password" value="" class="form-control <?= isset($errors['password_verif']) ? 'is-invalid' : '' ?>" id="password_verif" required name="password_verif" placeholder="password" />
                            <label for="password_verif" class="form-label px-4 boxContactTitle">Confirmer le mot de passe <span class='text-danger fw-bold'>*</span></label>
                            <div class="<?= isset($errors['password_verif']) ? 'errorForm errorBoxDown' : ''; ?>"><?= $errors['password_verif'] ?? '' ?></div>
                        </div>
                        <div class="col-12 text-danger text-start mb-4"><strong>* Champs obligatoires</strong></div>
                        <div class="col-12">
                            <button class="btn btnValid" type="submit">Inscription</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 boxConnexion text-center">
            <div class="row">
                <div class="col-12 py-4 mb-4 boxContact text-white fs-5">
                    <p class='py-3'>Pour créer un compte, renseigner votre adresse mail et le mot de passe souhaité (à confirmer)</p>
                    <p class='py-3'>Cliquer sur <button class='btn btnValid'>Inscription</button></p>
                    <p class='py-3'>Vous recevrez un mail avec un lien de validation valable une heure (vérifier vos spam)</p>
                    <p class='py-3'>Une fois votre compte validé, vous pourrez vous connecter au site</p>
                </div>
            </div>
        </div>
    </div>
</main>