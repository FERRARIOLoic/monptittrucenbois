<?php 
$userProfile = $pdo->query("SELECT `users`.`users_gender` as `gender`,
                                `users`.`users_firstname` as `firstname`,
                                `users`.`users_lastname` as `lastname`,
                                `users`.`users_email` as `email`,
                                `users`.`users_phone_number` as `phoneNumber`,
                                `users`.`users_birthdate` as `birthdate`,
                                `addresses_ships`.`id_address_ship` as `addressId`,
                                `addresses_ships`.`addresses_ship_address` as `address`,
                                `addresses_ships`.`addresses_ship_address_more` as `addressMore`,
                                `addresses_ships`.`addresses_ship_postal_code` as `postalCode`,
                                `addresses_ships`.`addresses_ship_city` as `city`
                                FROM `users`
                                INNER JOIN `addresses_ships` ON `users`.`id_addresses_ships` = `addresses_ships`.`id_address_ship`
                                WHERE `users_lastname` = ".$username."");
                                var_dump($gender);
?>

<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Bonjour <?= $userProfile['users_lastname'] ?></h1>
        </div>
    </div>
    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4 pb-5">
            Vous pouvez modifier votre profil
        </div>
    </div>
    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">

            <div class="row px-2">
                <div class="col-12">
                    <div class="row boxContact">
                        <div class="col-12 boxContactTitle text-center">Modifier mon profil</div>
                        <!------------- CATEGORY --------->
                        <div class="col-12 pt-4">
                            <div class="row boxCategory">
                                <div class="col-12">
                                    <strong>Vous êtes...</strong>
                                </div>
                                <div class="col-6">
                                    <input id="particulier" type="radio" name="category" value="particulier" <?= ($userProfile['particular'] == 0) ? 'checked' : ''; ?>>
                                    <label for="particulier">Particulier</label>
                                </div>
                                <div class="col-6">
                                    <input id="professionnel" type="radio" name="category" value="professionnel" <?= ($userProfile['particular'] == 1) ? 'checked' : ''; ?>>
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
                                    <input id="miss" type="radio" name="gender" value="Madame" <?= ($userProfile['gender'] == 0) ? 'checked' : ''; ?>>
                                    <label for="miss">Madame</label>
                                </div>
                                <div class="col-6">
                                    <input id="mister" type="radio" name="gender" value="Monsieur" <?= ($userProfile['gender'] == 1) ? 'checked' : ''; ?>>
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
                                    <input class="inputText" id="lastname" type="text" name="lastname" value="<?= ($userProfile['lastname']) ?? ''; ?>" placeholder="">
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
                                    <input class="inputText" id="firstname" type="text" name="firstname" value="<?= ($userProfile['firstname']) ?? ''; ?>" placeholder="">
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
                                    <input class="inputText" id="email" type="text" name="email" value="<?= ($userProfile['email']) ?? ''; ?>" placeholder="">
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
                                    <input class="inputText" id="phoneNumber" type="tel" name="phoneNumber" value="<?= ($userProfile['phoneNumber']) ?? ''; ?>" placeholder="">
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
                                    <input class="inputText" id="birthdate" type="date" name="birthdate" value="<?= ($userProfile['birthdate']) ?? ''; ?>" placeholder="">
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
                                    <input class="inputText" id="adress" type="text" name="adress" value="<?= ($userProfile['address']) ?? ''; ?>" placeholder="">
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
                                    <input class="inputText" id="adressMore" type="text" name="adressMore" value="<?= ($userProfile['addressMore']) ?? ''; ?>" placeholder="">
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
                                    <input class="inputText" id="postalCode" type="number" name="postalCode" value="<?= ($userProfile['postalCode']) ?? ''; ?>" placeholder="">
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
                                    <input class="inputText" id="city" type="text" name="city" value="<?= ($userProfile['city']) ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!------------- CONTACT HOW --------->
                        <div class="col-12">
                            <div class="row py-2 boxCategory">
                                <div class="col-12">
                                    <strong>Vous acceptez d'être contacté par...</strong>
                                </div>
                                <div class="col-6 py-1">
                                    <input id="email" type="checkbox" name="contactHow" value="email" <?= ($userProfile['contact']['email'] == 1) ? 'checked' : '' ?>>
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-6 py-1">
                                    <input id="phone" type="checkbox" name="contactHow" value="phone" <?= ($userProfile['contact']['phone'] == 1) ? 'checked' : '' ?>>
                                    <label for="phone">Téléphone</label>
                                </div>
                                <div class="col-6 py-1">
                                    <input id="letter" type="checkbox" name="contactHow" value="letter" <?= ($userProfile['contact']['adress'] == 1) ? 'checked' : '' ?>>
                                    <label for="letter">Courrier postal</label>
                                </div>
                            </div>
                        </div>
                        <!------------- CONTACT HOW --------->
                        <div class="col-12">
                            <div class="row py-2">
                                <div class="col-12 boxBtn text-center">
                                    <button type="submit" class="btnValid "><strong>Envoyer la demande</strong></button>
                                </div>
                            </div>
                        </div>
                        <div class="row boxBlank"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row boxBlank"></div>
</main>