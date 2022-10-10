<main class='container-fluid text-center'>
    <div class="row titlePage">
        <div class="col-12 py-3">
            <h1>Connexion</h1>
        </div>
    </div>
    <div class="row px-2 px-5">
        <div class="col-12 col-md-6 px-lg-5 py-4 boxSubCategoryWhite order-2 order-lg-1">
            <div class="row">
                <div class="col-12 fs-4 py-4">
                    Problèmes de connexion ?
                </div>
                <div class="col-12 py-3">
                    J'ai perdu mon mot de passe...
                </div>
                <div class="col-12 py-3">
                    Mon compte est désactivé...
                </div>
            </div>
        </div>
        <div class="col-12 offset-md-1 col-md-4 py-4 order-1 order-lg-2">

            <form class="row" method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

                <div class="error"><?= $errors['global'] ?? '' ?></div>

                <div class="form-floating mb-4">
                    <input type="email" autocomplete="email" value="<?= $email ?? '' ?>" class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>" id="email" name="email" required placeholder="dupondjean@gmail.com" />
                    <label for="email" class="form-label px-4 boxContactTitle">Adresse mail <span class='text-danger fw-bold'>*</span></label>
                </div>

                <div class="form-floating">
                    <input type="password" value="" class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>" id="password" required name="password" placeholder="Mot de passe" />
                    <label for="password" class="form-label px-4 boxContactTitle">Mot de passe <span class='text-danger fw-bold'>*</span></label>
                </div>

                <div class="col-12 text-danger text-start mb-4"><span class='fw-bold'>* Champs obligatoires</span></div>

                <div class="col-12">
                    <button class="btn btnValid" type="submit">Connexion</button>
                </div>
            </form>
        </div>
    </div>
</main>