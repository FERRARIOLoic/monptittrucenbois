<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Besoin de renseignements ?</h1>
        </div>
    </div>
    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4 pb-5">
            Complétez ce petit formulaire et je vous répondrai dans les plus brefs délais
        </div>
    </div>
    <div class="row">
        <div class="offset-1 col-10">
            <div class="row boxContact">
                <!------------- CATEGORY --------->
                <div class="col-12 col-md-6">
                    <div class="row boxCategory">
                        <div class="col-12 col-md-4">
                            <strong>Vous êtes...</strong>
                        </div>
                        <div class="col-6 col-md-4">
                            <input id="particulier" type="radio" name="category" value="particulier">
                            <label for="particulier">Particulier</label>
                        </div>
                        <div class="col-6 col-md-4">
                            <input id="professionnel" type="radio" name="category" value="professionnel">
                            <label for="professionnel">Professionnel</label>
                        </div>
                    </div>
                </div>
                <!------------- GENDER --------->
                <div class="col-12 col-md-6">
                    <div class="row boxCategory">
                        <div class="col-12 col-md-4">
                            <strong>Civilité</strong>
                        </div>
                        <div class="col-6 col-md-4">
                            <input id="miss" type="radio" name="gender" value="Madame">
                            <label for="miss">Madame</label>
                        </div>
                        <div class="col-6 col-md-4">
                            <input id="mister" type="radio" name="gender" value="Monsieur">
                            <label for="mister">Monsieur</label>
                        </div>
                    </div>
                </div>
                <div class="row boxBlank"></div>
                <!------------- LASTNAME --------->
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="text" autocomplete="lastname" value="<?= $_SESSION['user']->users_lastname ?? '' ?>" class="form-control <?= isset($errors['user']->users_lastname) ? 'is-invalid' : '' ?>" id="lastname" name="lastname" required placeholder="lastname" />
                        <label for="lastname" class="form-label">Nom*</label>
                    </div>
                </div>
                <!------------- FIRSTNAME --------->
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="text" autocomplete="firstname" value="<?= $_SESSION['user']->users_firstname ?? '' ?>" class="form-control <?= isset($errors['users']->users_firstname) ? 'is-invalid' : '' ?>" id="firstname" name="firstname" required placeholder="firstname" />
                        <label for="firstname" class="form-label">Prénom*</label>
                    </div>
                </div>
                <!------------- EMAIL --------->
                <div class="col-12 col-md-4">
                    <div class="form-floating">
                        <input type="email" autocomplete="email" value="<?= $_SESSION['user']->users_email ?? '' ?>" class="form-control <?= isset($errors['user']->users_email) ? 'is-invalid' : '' ?>" id="email" name="email" required placeholder="email" />
                        <label for="email" class="form-label">Adresse mail*</label>
                    </div>
                </div>
                <!------------- PHONE --------->
                <div class="col-12 col-md-4">
                    <div class="form-floating">
                        <input type="phone" autocomplete="phone" value="<?= $_SESSION['user']->users_phone_number ?? '' ?>" class="form-control <?= isset($errors['user']->users_phone_number) ? 'is-invalid' : '' ?>" id="phone" name="phone" required placeholder="phone" />
                        <label for="phone" class="form-label">Téléphone*</label>
                    </div>
                </div>
                <!------------- BIRTHDAY --------->
                <div class="col-12 col-md-4">
                    <div class="form-floating">
                        <input type="date" autocomplete="birthdate" value="<?= $_SESSION['user']->users_birthdate ?? '' ?>" class="form-control <?= isset($errors['user']->users_birthdate) ? 'is-invalid' : '' ?>" id="birthdate" name="birthdate" required placeholder="birthdate" />
                        <label for="birthdate" class="form-label">Date de naissance*</label>
                    </div>
                </div>
                <div class="row boxBlank"></div>
                <!------------- ADRESS --------->
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="text" autocomplete="address" value="<?= $_SESSION['user']->users_address ?? '' ?>" class="form-control <?= isset($errors['address']) ? 'is-invalid' : '' ?>" id="address" name="address" required placeholder="<?= $address ; ?>" />
                        <label for="address" class="form-label">Adresse postale*</label>
                    </div>
                </div>
                <!------------- ADRESS MORE --------->
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="text" autocomplete="address_more" value="<?= $address_more ?? '' ?>" class="form-control <?= isset($errors['address_more']) ? 'is-invalid' : '' ?>" id="address_more" name="address_more" required placeholder="<?= $address_more ; ?>" />
                        <label for="address_more" class="form-label">Complément d'adresse</label>
                    </div>
                </div>
                <!------------- POSTAL CODE --------->
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="number" autocomplete="postal_code" value="<?= $postal_code ?? '' ?>" class="form-control <?= isset($errors['postal_code']) ? 'is-invalid' : '' ?>" id="postal_code" name="postal_code" required placeholder="<?= $postal_code ; ?>" />
                        <label for="postal_code" class="form-label">Code postal*</label>
                    </div>
                </div>
                <!------------- CITY --------->
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        <input type="text" autocomplete="city" value="<?= $city ?? '' ?>" class="form-control <?= isset($errors['city']) ? 'is-invalid' : '' ?>" id="city" name="city" required placeholder="<?= $city ; ?>" />
                        <label for="city" class="form-label">Ville*</label>
                    </div>
                </div>
                <div class="row boxBlank"></div>
                <!------------- MESSAGE --------->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <strong><label for="message">Votre message</label></strong>
                        </div>
                    </div>
                    <div class="row boxInput">
                        <div class="col-12 col-md-12">
                            <textarea name="message" id="message" cols="" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row boxBlank"></div>
                <!------------- CLIENT NEW --------->
                <div class="col-12">
                    <div class="row boxCategory">
                        <div class="col-12 col-md-4">
                            <strong>Déjà client ?</strong>
                        </div>
                        <div class="col-6 col-md-4">
                            <input id="clientYes" type="radio" name="clientNew" value="clientYes">
                            <label for="clientYes">Oui</label>
                        </div>
                        <div class="col-6 col-md-4">
                            <input id="clientNo" type="radio" name="clientNew" value="clientNo">
                            <label for="clientNo">Non</label>
                        </div>
                    </div>
                </div>
                <div class="row boxBlank"></div>
                <!------------- GIFT REASON --------->
                <div class="col-12">
                    <div class="row boxCategory">
                        <div class="col-12">
                            <strong>Motif du cadeau ?</strong>
                        </div>
                        <div class="col-6 col-md-2">
                            <input id="giftBirthday" type="radio" name="giftReason" value="giftBirthday">
                            <label for="giftBirthday">Anniversaire</label>
                        </div>
                        <div class="col-6 col-md-2">
                            <input id="giftWedding" type="radio" name="giftReason" value="giftWedding">
                            <label for="giftWedding">Mariage</label>
                        </div>
                        <div class="col-6 col-md-2">
                            <input id="giftRetreat" type="radio" name="giftReason" value="giftRetreat">
                            <label for="giftRetreat">Retraite</label>
                        </div>
                        <div class="col-6 col-md-2">
                            <input id="giftParty" type="radio" name="giftReason" value="giftParty">
                            <label for="giftParty">Fête</label>
                        </div>
                        <div class="col-6 col-md-2">
                            <input id="giftOther" type="radio" name="giftReason" value="giftOther">
                            <label for="giftOther">Autre</label>
                        </div>
                    </div>
                </div>
                <div class="row boxBlank"></div>
                <!------------- CONTACT HOW --------->
                <div class="col-12">
                    <div class="row boxCategory">
                        <div class="col-12">
                            <strong>Vous acceptez d'être contacté par...</strong>
                        </div>
                        <div class="col-6 col-md-3">
                            <input id="email" type="checkbox" name="contactHow" value="email">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-6 col-md-3">
                            <input id="phone" type="checkbox" name="contactHow" value="phone">
                            <label for="phone">Téléphone</label>
                        </div>
                        <div class="col-6 col-md-3">
                            <input id="letter" type="checkbox" name="contactHow" value="letter">
                            <label for="letter">Courrier postal</label>
                        </div>
                    </div>
                </div>
                <div class="row boxBlank"></div>
                <!------------- CONTACT HOW --------->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 boxBtn text-center">
                            <button type="submit" class="btnValid "><strong>Envoyer la demande</strong></button>
                        </div>
                    </div>
                </div>
                <div class="row boxBlank"></div>
            </div>
        </div>
    </div>
    <div class="row boxBlank"></div>
</main>