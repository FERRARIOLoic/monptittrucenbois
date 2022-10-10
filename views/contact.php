<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Besoin de renseignements ?</h1>
        </div>
    </div>
    <div class="row descriptionPage boxContact py-3">
        <div class="offset-1 col-10 text-center align-self-center fs-4">
            Une question, une interrogation ? Consultez notre <a href='foire_questions.html'>Foire aux questions</a>
        </div>
    </div>
    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4 pb-5">
            Vous n'avez pas trouvé la réponse à votre question ?<br>Remplissez ce petit formulaire et je vous répondrai dans les plus brefs délais...
        </div>
    </div>
    <div class="row">
        <div class="offset-1 col-10">
            <div class="row boxContact py-4 mb-5">
                <!------------- CATEGORY --------->
                <div class="col-12 col-md-6 px-5">
                    <div class="row boxSubCategory py-2">
                        <div class="col-12 col-md-4">
                            <strong>Vous êtes...</strong>
                        </div>
                        <div class="col-6 col-md-4">
                            <input id="particulier" type="radio" name="category" value="particulier" <?= (($user_info->users_type ?? '') == 1) ? 'checked' : ''; ?>>
                            <label for="particulier">Particulier</label>
                        </div>
                        <div class="col-6 col-md-4">
                            <input id="professionnel" type="radio" name="category" value="professionnel" <?= (($user_info->users_type ?? '') == 2) ? 'checked' : ''; ?>>
                            <label for="professionnel">Professionnel</label>
                        </div>
                    </div>
                </div>
                <!------------- GENDER --------->
                <div class="col-12 col-md-6 px-5">
                    <div class="row boxSubCategory py-2">
                        <div class="col-12 col-md-4">
                            <strong>Civilité</strong>
                        </div>
                        <div class="col-6 col-md-4">
                            <input id="miss" type="radio" name="gender" value="Madame" <?= (($user_info->users_gender ?? '') == 1) ? 'checked' : ''; ?>>
                            <label for="miss">Madame</label>
                        </div>
                        <div class="col-6 col-md-4">
                            <input id="mister" type="radio" name="gender" value="Monsieur" <?= (($user_info->users_gender ?? '') == 2) ? 'checked' : ''; ?>>
                            <label for="mister">Monsieur</label>
                        </div>
                    </div>
                </div>

                <div class="col-12 p-2 pt-3">
                    <div class="row boxCategory">

                        <!------------- LASTNAME --------->
                        <div class="col-12 col-md-6">
                            <div class="form-floating">
                                <input type="text" autocomplete="lastname" value="<?= $user_info->users_lastname ?? '' ?>" class="form-control <?= isset($errors['user']->users_lastname) ? 'is-invalid' : '' ?>" id="lastname" name="lastname" required placeholder="lastname" />
                                <label for="lastname" class="form-label px-4">Nom</label>
                            </div>
                        </div>
                        <!------------- FIRSTNAME --------->
                        <div class="col-12 col-md-6">
                            <div class="form-floating">
                                <input type="text" autocomplete="firstname" value="<?= $user_info->users_firstname ?? '' ?>" class="form-control <?= isset($errors['users']->users_firstname) ? 'is-invalid' : '' ?>" id="firstname" name="firstname" required placeholder="firstname" />
                                <label for="firstname" class="form-label px-4">Prénom</label>
                            </div>
                        </div>
                        <!------------- EMAIL --------->
                        <div class="col-12 col-md-4">
                            <div class="form-floating">
                                <input type="email" autocomplete="email" value="<?= $user_info->users_email ?? '' ?>" class="form-control <?= isset($errors['user']->users_email) ? 'is-invalid' : '' ?>" id="email" name="email" required placeholder="email" required />
                                <label for="email" class="form-label px-4">Adresse mail <span class='text-danger fw-bold'>*</span></label>
                            </div>
                        </div>
                        <!------------- PHONE --------->
                        <div class="col-12 col-md-4">
                            <div class="form-floating">
                                <input type="phone" autocomplete="phone" value="<?= $user_info->users_phone ?? '' ?>" class="form-control <?= isset($errors['user']->users_phone_number) ? 'is-invalid' : '' ?>" id="phone" name="phone" required placeholder="phone" />
                                <label for="phone" class="form-label px-4">Téléphone</label>
                            </div>
                        </div>
                        <!------------- BIRTHDAY --------->
                        <div class="col-12 col-md-4">
                            <div class="form-floating">
                                <input type="date" autocomplete="birthdate" value="<?= $user_info->users_birthdate ?? '' ?>" class="form-control <?= isset($errors['user']->users_birthdate) ? 'is-invalid' : '' ?>" id="birthdate" name="birthdate" required placeholder="birthdate" />
                                <label for="birthdate" class="form-label px-4">Date de naissance</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-2 pt-3">
                    <div class="row boxCategory">
                        <!------------- ADRESS --------->
                        <div class="col-12 col-md-6">
                            <div class="form-floating">
                                <input type="text" autocomplete="address" value="<?= $user_info->addresses_address ?? '' ?>" class="form-control <?= isset($errors['address']) ? 'is-invalid' : '' ?>" id="address" name="address" required placeholder="<?= $address; ?>" />
                                <label for="address" class="form-label px-4">Adresse postale</label>
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
                                <label for="postal_code" class="form-label px-4">Code postal</label>
                            </div>
                        </div>
                        <!------------- CITY --------->
                        <div class="col-12 col-md-6">
                            <div class="form-floating">
                                <input type="text" autocomplete="city" value="<?= $user_info->addresses_city ?? '' ?>" class="form-control <?= isset($errors['city']) ? 'is-invalid' : '' ?>" id="city" name="city" required placeholder="<?= $city; ?>" />
                                <label for="city" class="form-label px-4">Ville</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-2 pt-3">
                    <div class="row boxCategory">
                        <!------------- MESSAGE --------->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <strong><label for="message">Votre message <span class='text-danger fw-bold'>*</span></label></strong>
                                </div>
                            </div>
                            <div class="row boxInput">
                                <div class="col-12 col-md-12">
                                    <textarea name="message" id="message" cols="" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-danger text-start"><span class='fw-bold'>* Champs obligatoires</span></div>
                <div class="col-12 p-2 pt-3 ">
                    <div class="row boxCategory py-2">
                        <!------------- SEND MESSAGE --------->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 boxBtn text-center">
                                    <button type="submit" class="btn btnValid"><strong>Envoyer le message</strong></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>