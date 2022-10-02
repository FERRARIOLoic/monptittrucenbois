<main class='container-fluid text-center'>
    <div class="row titlePage">
        <div class="col-12 ">
            <h1>Validation de votre compte</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 py-3">
            <p><?= $message ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <form class="mb-5" method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

                <div class="error"><?= $errors['global'] ?? '' ?></div>

                <div class="form-floating mb-4">
                    <input type="email" autocomplete="email" value="<?= $email ?? '' ?>" class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>" id="email" name="email" required placeholder="dupondjean@gmail.com" />
                    <label for="email" class="form-label px-4">Adresse mail*</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" value="" class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>" id="password" required name="password" placeholder="*****" />
                    <label for="password" class="form-label px-4">Mot de passe*</label>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Connexion</button>
                </div>
            </form>
        </div>
    </div>




</main>