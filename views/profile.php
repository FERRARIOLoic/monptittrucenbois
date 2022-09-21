<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Bonjour <?= $user_info->users_lastname ?></h1>
        </div>
    </div>
    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4 pb-5">
            <?php
            if (empty($user_info->users_lastname) or empty($user_info->users_lastname)) { ?>
                Merci de compléter votre profil
            <?php } else { ?>
                Vous pouvez modifier votre profil
            <?php }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="row px-5">
                <div class="col-12">
                    <form action='' method='post' class="row boxContact">
                        <div class="col-12 boxContactTitle text-center">Mes commandes en cours
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="row px-5">
                <div class="col-12">
                    <form action='' method='post' class="row boxContact">
                        <div class="col-12 boxContactTitle text-center">Mes anciennes commandes
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">

            <div class="row px-5">
                <div class="col-12">
                    <form action='' method='post' class="row boxContact">
                        <div class="col-12 boxContactTitle text-center">Mes informations de profil</div>
                        <!------------- CATEGORY --------->
                        <div class="col-12 pt-4">
                            <div class="row boxCategory">
                                <div class="col-12">
                                    <strong>Vous êtes...</strong>
                                </div>
                                <div class="col-6">
                                    <input id="particulier" type="radio" name="category" value="particulier" <?= ($user_info->users_category == 1) ? 'checked' : ''; ?>>
                                    <label for="particulier">Particulier</label>
                                </div>
                                <div class="col-6">
                                    <input id="professionnel" type="radio" name="category" value="professionnel" <?= ($user_info->users_category == 2) ? 'checked' : ''; ?>>
                                    <label for="professionnel">Professionnel</label>
                                </div>
                            </div>
                        </div>
                        <!------------- GENDER --------->
                        <div class="col-12">
                            <div class="row boxCategory">
                                <div class="col-12">
                                    <strong>Civilité</strong>
                                </div>
                                <div class="col-6">
                                    <input id="miss" type="radio" class="<?= ($user_info->users_gender == 3) ? 'is-invalid' : ''; ?>" name="gender" value="Madame" <?= ($user_info->users_gender == 0) ? 'checked' : ''; ?>>
                                    <label for="miss">Madame</label>
                                </div>
                                <div class="col-6">
                                    <input id="mister" type="radio" name="gender" value="Monsieur" <?= ($user_info->users_gender == 1) ? 'checked' : ''; ?>>
                                    <label for="mister">Monsieur</label>
                                </div>
                            </div>
                        </div>
                        <!------------- LASTNAME --------->
                        <div class="col-12 pt-3">
                            <div class="row py-2">
                                <div class="col-12 align-self-center">
                                    <strong><label for="lastname">Nom</label></strong>
                                </div>
                                <div class="col-12 text-start align-self-center">
                                    <input class="form-control <?= empty($user_info->users_lastname) ? 'is-invalid' : ''; ?>" id="lastname" type="text" name="lastname" value="<?= ($user_info->users_lastname) ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!------------- FIRSTNAME --------->
                        <div class="col-12">
                            <div class="row py-2">
                                <div class="col-12 align-self-center">
                                    <strong><label for="firstname">Prénom</label></strong>
                                </div>
                                <div class="col-12 align-self-center">
                                    <input class="form-control <?= empty($user_info->users_firstname) ? 'is-invalid' : ''; ?>" id="firstname" type="text" name="firstname" value="<?= ($user_info->users_firstname) ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!------------- EMAIL --------->
                        <div class="col-12 pt-3">
                            <div class="row py-2">
                                <div class="col-12 align-self-center">
                                    <strong><label for="email">Adresse Email</label></strong>
                                </div>
                                <div class="col-12 align-self-center">
                                    <input class="form-control <?= empty($user_info->users_email) ? 'is-invalid' : ''; ?>" id="email" type="text" name="email" value="<?= ($user_info->users_email) ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!------------- PHONE --------->
                        <div class="col-6">
                            <div class="row py-2">
                                <div class="col-12 align-self-center">
                                    <strong><label for="phoneNumber">Téléphone</label></strong>
                                </div>
                                <div class="col-12 align-self-center">
                                    <input class="form-control <?= empty($user_info->users_phoneNumber) ? 'is-invalid' : ''; ?>" id="phoneNumber" type="tel" name="phoneNumber" value="<?= ($user_info->users_phoneNumber) ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!------------- BIRTHDATE --------->
                        <div class="col-6">
                            <div class="row py-2">
                                <div class="col-12 align-self-center">
                                    <strong><label for="birthdate">Date de naissance</label></strong>
                                </div>
                                <div class="col-12 align-self-center">
                                    <input class="form-control <?= empty($user_info->users_birthdate) ? 'is-invalid' : ''; ?>" id="birthdate" type="date" name="birthdate" value="<?= ($user_info->users_birthdate) ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!------------- ADRESS --------->
                        <div class="col-12 pt-3">
                            <div class="row py-2">
                                <div class="col-12 align-self-center">
                                    <strong><label for="adress">Adresse postale</label></strong>
                                </div>
                                <div class="col-12 align-self-center">
                                    <input class="form-control <?= empty($user_info->users_address) ? 'is-invalid' : ''; ?>" id="adress" type="text" name="adress" value="<?= ($user_info->users_address) ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!------------- ADRESS MORE --------->
                        <div class="col-12">
                            <div class="row py-2">
                                <div class="col-12 align-self-center">
                                    <strong><label for="adressMore">Complément d'adresse</label></strong>
                                </div>
                                <div class="col-12 align-self-center">
                                    <input class="form-control <?= empty($user_info->users_addressMore) ? 'is-invalid' : ''; ?>" id="adressMore" type="text" name="adressMore" value="<?= ($user_info->users_addressMore) ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!------------- POSTAL CODE --------->
                        <div class="col-6">
                            <div class="row py-2">
                                <div class="col-12 align-self-center">
                                    <strong><label for="postalCode">Code Postal</label></strong>
                                </div>
                                <div class="col-12 align-self-center">
                                    <input class="form-control <?= empty($user_info->users_postalCode) ? 'is-invalid' : ''; ?>" id="postalCode" type="number" name="postalCode" value="<?= ($user_info->users_postalCode) ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!------------- CITY --------->
                        <div class="col-6">
                            <div class="row py-2">
                                <div class="col-12 align-self-center">
                                    <strong><label for="city">Ville</label></strong>
                                </div>
                                <div class="col-12 align-self-center">
                                    <input class="form-control <?= empty($user_info->users_city) ? 'is-invalid' : ''; ?>" id="city" type="text" name="city" value="<?= ($user_info->users_city) ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!------------- CONTACT HOW --------->
                        <div class="col-12">
                            <div class="row py-2">
                                <div class="col-12 boxBtn text-center">
                                    <button type="submit" class="btnValid text-black"><strong>Enregistrer les modifications</strong></button>
                                </div>
                            </div>
                        </div>
                        <div class="row boxBlank"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row boxBlank"></div>
</main>