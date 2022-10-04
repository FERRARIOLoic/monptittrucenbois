<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="offset-md-2 col-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>
                <div class=" col-12 px-4 py-3 p-md-5">
                    <!------------- BOX CATEGORY --------->
                    <div class="row">
                        <div class="col-12">
                            <div class="row boxContact py-4 mb-5">
                                <!------------- CATEGORY --------->
                                <div class="col-12 col-md-6 px-5">
                                    <div class="row boxSubCategory py-2">
                                        <div class="col-6">
                                            <input id="particulier" type="radio" name="category" value="particulier" <?= (($user_info->users_type??0) == 1) ? 'checked' : ''; ?>>
                                            <label for="particulier">Particulier</label>
                                        </div>
                                        <div class="col-6">
                                            <input id="professionnel" type="radio" name="category" value="professionnel" <?= (($user_info->users_type??0) == 2) ? 'checked' : ''; ?>>
                                            <label for="professionnel">Professionnel</label>
                                        </div>
                                    </div>
                                </div>
                                <!------------- GENDER --------->
                                <div class="col-12 col-md-6 px-5">
                                    <div class="row boxSubCategory py-2">
                                        <div class="col-6">
                                            <input id="miss" type="radio" name="gender" value="Madame" <?= (($user_info->users_gender??0) == 1) ? 'checked' : ''; ?>>
                                            <label for="miss">Madame</label>
                                        </div>
                                        <div class="col-6">
                                            <input id="mister" type="radio" name="gender" value="Monsieur" <?= (($user_info->users_gender??0) == 2) ? 'checked' : ''; ?>>
                                            <label for="mister">Monsieur</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 p-2 pt-5">
                                    <div class="row boxCategory">

                                        <!------------- LASTNAME --------->
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating">
                                                <input type="text" autocomplete="lastname" value="<?= $user_info->users_lastname ?? '' ?>" class="form-control <?= isset($errors['user']->users_lastname) ? 'is-invalid' : '' ?>" id="lastname" name="lastname" required placeholder="lastname" />
                                                <label for="lastname" class="form-label px-4">Nom*</label>
                                            </div>
                                        </div>
                                        <!------------- FIRSTNAME --------->
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating">
                                                <input type="text" autocomplete="firstname" value="<?= $user_info->users_firstname ?? '' ?>" class="form-control <?= isset($errors['users']->users_firstname) ? 'is-invalid' : '' ?>" id="firstname" name="firstname" required placeholder="firstname" />
                                                <label for="firstname" class="form-label px-4">Prénom*</label>
                                            </div>
                                        </div>
                                        <!------------- EMAIL --------->
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating">
                                                <input type="email" autocomplete="email" value="<?= $user_info->users_email ?? '' ?>" class="form-control <?= isset($errors['user']->users_email) ? 'is-invalid' : '' ?>" id="email" name="email" required placeholder="email" />
                                                <label for="email" class="form-label px-4">Adresse mail*</label>
                                            </div>
                                        </div>
                                        <!------------- PHONE --------->
                                        <div class="col-12 col-md-3">
                                            <div class="form-floating">
                                                <input type="phone" autocomplete="phone" value="<?= $user_info->users_phone ?? '' ?>" class="form-control <?= isset($errors['user']->users_phone_number) ? 'is-invalid' : '' ?>" id="phone" name="phone" required placeholder="phone" />
                                                <label for="phone" class="form-label px-4">Téléphone*</label>
                                            </div>
                                        </div>
                                        <!------------- BIRTHDAY --------->
                                        <div class="col-12 col-md-3">
                                            <div class="form-floating">
                                                <input type="date" autocomplete="birthdate" value="<?= $user_info->users_birthdate ?? '' ?>" class="form-control <?= isset($errors['user']->users_birthdate) ? 'is-invalid' : '' ?>" id="birthdate" name="birthdate" required placeholder="birthdate" />
                                                <label for="birthdate" class="form-label px-4">Date de naissance*</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-2 pt-5">
                                    <div class="row boxCategory">
                                        <!------------- ADRESS --------->
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating">
                                                <input type="text" autocomplete="address" value="<?= $user_info->addresses_address ?? '' ?>" class="form-control <?= isset($errors['address']) ? 'is-invalid' : '' ?>" id="address" name="address" required placeholder="<?= $address; ?>" />
                                                <label for="address" class="form-label px-4">Adresse postale*</label>
                                            </div>
                                        </div>
                                        <!------------- ADRESS MORE --------->
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating">
                                                <input type="text" autocomplete="address_more" value="<?= $address_more ?? '' ?>" class="form-control <?= isset($errors['address_more']) ? 'is-invalid' : '' ?>" id="address_more" name="address_more" required placeholder="<?= $address_more; ?>" />
                                                <label for="address_more" class="form-label px-4">Complément d'adresse</label>
                                            </div>
                                        </div>
                                        <!------------- POSTAL CODE --------->
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating">
                                                <input type="number" autocomplete="postal_code" value="<?= $user_info->addresses_postal_code ?? '' ?>" class="form-control <?= isset($errors['postal_code']) ? 'is-invalid' : '' ?>" id="postal_code" name="postal_code" required placeholder="<?= $postal_code; ?>" />
                                                <label for="postal_code" class="form-label px-4">Code postal*</label>
                                            </div>
                                        </div>
                                        <!------------- CITY --------->
                                        <div class="col-12 col-md-6">
                                            <div class="form-floating">
                                                <input type="text" autocomplete="city" value="<?= $user_info->addresses_city ?? '' ?>" class="form-control <?= isset($errors['city']) ? 'is-invalid' : '' ?>" id="city" name="city" required placeholder="<?= $city; ?>" />
                                                <label for="city" class="form-label px-4">Ville*</label>
                                            </div>
                                        </div>
                                        <!------------- VALIDATE FORM --------->
                                        <div class="col-12 text-center pt-5">
                                                <button type='submit' class='btn btnValid' name='' value=''>Enregistrer les informations</button>
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