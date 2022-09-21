<h1>Inscription</h1>

<form class="mb-5" novalidate method="POST" action="inscription.html">

    <div class="form-floating mb-4">
        <input type="email" autocomplete="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" required placeholder="dupondjean@gmail.com" />
        <label for="email" class="form-label">Email*</label>
        <div class="error"><?= $errors['email'] ?? '' ?></div>
    </div>

    <div class="form-floating mb-4">
        <input type="password" autocomplete="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" required name="password" placeholder="password"/>
        <label for="password" class="form-label">Mot de passe*</label>
        <div class="error"><?= $errors['password'] ?? '' ?></div>
    </div>

    <div class="form-floating mb-4">
        <input type="password" value="" class="form-control <?= isset($errors['password_verif']) ? 'is-invalid' : '' ?>" id="password_verif" required name="password_verif" placeholder="password"/>
        <label for="password_verif" class="form-label">Confirmer le mot de passe*</label>
        <div class="error"><?= $errors['password_verif'] ?? '' ?></div>
    </div>


    <div class="col-12">
        <button class="btn btn-primary" type="submit">Inscription</button>
    </div>
</form>