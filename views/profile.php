<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 pb-3 text-center align-self-center">
            <h1>Ma page profil</h1>
        </div>
        <?php
        if (empty($user_info->users_lastname) or empty($user_info->users_lastname)) { ?>
    </div>
    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4 pb-5">
            Merci de compléter votre profil
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="col-12 col-md-8">
        <div class="row p-2 px-md-5">
            <div class="col-12">
                <div class='row boxContact'>
                    <div class="col-12 py-3 boxContactTitle text-center border-bottom border-1">
                        Ma commande en cours
                    </div>

                    <div class="col-12">
                        <div class="row p-2 px-md-5 pt-4">
                            <div class="col-3 border-bottom border-1 border-secondary"><strong>Produit</strong></div>
                            <div class="col-2 text-end border-bottom border-1 border-secondary"><strong>Quantité</strong></div>
                            <div class="col-2 text-end border-bottom border-1 border-secondary"><strong>Prix unitaire</strong></div>
                            <div class="col-2 text-end border-bottom border-1 border-secondary"><strong>Prix total</strong></div>
                        </div>
                    </div>
                    <?php
                    foreach ($orders_pending as $order_info) :
                        $order_weight = ($order_weight ?? 0) + ($order_info->orders_weight * $order_info->orders_quantity);
                        $order_price_product = $order_info->orders_quantity * $order_info->orders_price;
                        $order_price_total = ($order_price_total ?? 0) + $order_price_product;
                    ?>
                        <div class="col-12">
                            <div class="row p-2 px-md-5">
                                <div class="col-3">
                                    <?= $order_info->products_name ?>
                                </div>
                                <div class="col-2 text-end">
                                    <?= $order_info->orders_quantity ?>
                                </div>
                                <div class="col-2 text-end">
                                    <?= $order_info->orders_price ?>
                                </div>
                                <div class="col-2 text-end">
                                    <?= $order_price_product ?>
                                </div>
                                <div class="col-2 text-end">
                                    <button type='submit' class='btn btnValidSmallX' onclick="toggle_text('update_<?= $order_info->id_order ?>');" alt='Modifier la quantité' title='Modifier la quantité'>Modifier</button>
                                </div>
                                <div class="col-1">
                                    <form action='' method='post'>
                                        <input type='hidden' name='id_order' value='<?= $order_info->id_order; ?>'>
                                        <button type='submit' class='btn btnValidSmallX' name='action_profile' value='delete' alt='Supprimer le produit' title='Supprimer le produit'>X</button>
                                    </form>
                                </div>
                            </div>
                            <span id="update_<?= $order_info->id_order ?>" style="display:none;">
                                <form action='' method='post' class='col-9 boxSubCategory p-2'>
                                    <input type='hidden' name='id_order' value='<?= $order_info->id_order; ?>'>
                                    <div class="row">
                                        <div class="col-4 text-center align-self-center">
                                            Quantité souhaitée
                                        </div>
                                        <div class="col-2 text-center align-self-center">
                                            <select class='selectQuantity' name='quantity'>
                                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                                    <option <?= ($order_info->orders_quantity == $i) ? 'selected' : ''; ?>><?= $i ?></option>
                                                <?php endfor ?>
                                            </select>
                                        </div>
                                        <div class="col-5 text-end align-self-center">
                                            <button type='submit' class='btn btnValidSmallX' name='action_profile' value='modify'>Enregistrer les modifications</button>
                                        </div>
                                    </div>
                                </form>
                            </span>
                        </div>


                        <!------------- TOTAL WEIGHT / PRICE --------->
                    <?php endforeach ?>
                    <div class="col-12 border-top border-1 py-3">
                        <div class="row p-2 px-md-5">
                            <div class="col-6">Poids total : <?= $order_weight ?? '' ?> grammes</div>
                            <div class="col-6">Coût total de la commande : <?= $order_price_total ?? ''; ?> €</div>
                        </div>
                    </div>

                    <!------------- LIST CHOICE CARRIER --------->
                    <div class="col-12 pb-3">
                        <div class="row">
                            <div class="col-4 text-center">Choix du transporteur :</div>
                            <div class="col-4">
                                <select class='form-select' name='id_carrier'>
                                    <?php
                                    foreach ($carriers_list as $carrier_info) : ?>
                                        <option value='<?= $carrier_info->id_carrier ?>' <?= $carrier_info->carriers_name == 'Chronopost' ? 'selected' : ''; ?>><?= $carrier_info->carriers_name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-4 text-center">
                                <button type='submit' class='btn btnValidSmall' name='action_profile' value='carrier_choice'>Enregistrer</button>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">

        <div class="row p-2 px-md-5">
            <div class="col-12">
                <form action='' method='post' class='row boxContact'>
                    <div class="col-12 py-3 boxContactTitle text-center border-bottom border-1">
                        <h4>Mes informations de profil</h4>
                    </div>
                    <!------------- CATEGORY --------->
                    <div class="col-12 pt-2">
                        <div class="row boxCategory">
                            <div class="col-12">
                                <strong>Vous êtes...</strong>
                            </div>
                            <div class="col-6">
                                <input id="particulier" type="radio" name="category" value="1" <?= ($user_info->users_type == 1) ? 'checked' : ''; ?>>
                                <label for="particulier">Particulier</label>
                            </div>
                            <div class="col-6">
                                <input id="professionnel" type="radio" name="category" value="2" <?= ($user_info->users_type == 2) ? 'checked' : ''; ?>>
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
                                <input id="miss" type="radio" class="<?= ($user_info->users_gender == 3) ? 'is-invalid' : ''; ?>" name="gender" value="1" <?= ($user_info->users_gender == 1) ? 'checked' : ''; ?>>
                                <label for="miss">Madame</label>
                            </div>
                            <div class="col-6">
                                <input id="mister" type="radio" name="gender" value="2" <?= ($user_info->users_gender == 2) ? 'checked' : ''; ?>>
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
                                <input class="form-control <?= empty($user_info->users_phone) ? 'is-invalid' : ''; ?>" id="phoneNumber" type="tel" name="phone" value="<?= ($user_info->users_phone) ?? ''; ?>" placeholder="">
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
                    <!------------- BUTTON VALID --------->
                    <div class="col-12">
                        <div class="row py-4">
                            <div class="col-12 boxBtn text-center">
                                <button type="submit" class="btn btnValid" name='action_profile' value='profile_info'><strong>Enregistrer les modifications</strong></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row my-5 px-2 px-md-5">
    <div class="col-12 boxContact mb-3">
        <div class="row">
            <div class="col-12 py-3 boxContactTitle text-center">
                Mes adresses
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-4 px-md-5 col-md-4">
                <div class="row py-3">
                    <div class="col-12 py-3 boxSubCategoryUp boxContactTitle text-center border-bottom border-1">
                        Adresse principale
                    </div>
                    <div class="col-12 py-3 px-4 boxSubCategoryDown">
                        <form action='' method='post'>
                            <div class="row boxContact">
                                <!------------- ADRESS --------->
                                <div class="col-12 pt-3">
                                    <div class="row py-2">
                                        <div class="col-12 align-self-center">
                                            <strong><label for="address">Adresse postale</label></strong>
                                        </div>
                                        <div class="col-12 align-self-center">
                                            <input class="form-control <?= empty($address_first->addresses_address) ? 'is-invalid' : ''; ?>" id="address" type="text" name="address" value="<?= ($address_first->addresses_address) ?? ''; ?>" placeholder="">
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
                                            <input class="form-control" id="adress_more" type="text" name="adress_more" value="<?= ($address_first->addresses_address_more) ?? ''; ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <!------------- POSTAL CODE --------->
                                <div class="col-12 col-md-6">
                                    <div class="row py-2">
                                        <div class="col-12 align-self-center">
                                            <strong><label for="postalCode">Code Postal</label></strong>
                                        </div>
                                        <div class="col-12 align-self-center">
                                            <input class="form-control <?= empty($address_first->addresses_postal_code) ? 'is-invalid' : ''; ?>" id="postal_code" type="number" name="postal_code" value="<?= ($address_first->addresses_postal_code) ?? ''; ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <!------------- CITY --------->
                                <div class="col-12 col-md-6">
                                    <div class="row py-2">
                                        <div class="col-12 align-self-center">
                                            <strong><label for="city">Ville</label></strong>
                                        </div>
                                        <div class="col-12 align-self-center">
                                            <input class="form-control <?= empty($address_first->addresses_city) ? 'is-invalid' : ''; ?>" id="city" type="text" name="city" value="<?= ($address_first->addresses_city) ?? ''; ?>" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <!------------- BUTTON VALID --------->
                                <div class="col-12">
                                    <div class="row py-4">
                                        <div class="col-12 boxBtn text-center">
                                            <button type="submit" class="btn btnValid" name='action_profile' value='address'><strong>Enregistrer les modifications</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 px-4 px-md-5 col-md-8">
                <div class="row py-3">
                    <div class="col-12 py-3 boxSubCategoryUp boxContactTitle text-center border-bottom border-1">
                        Autres adresses de livraison
                    </div>
                    <div class="col-12 py-3 boxSubCategoryDown">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <!------------- ADRESS --------->
                                <div class="col-12  p-3 boxContact">
                                    <div class="row py-2">
                                        <div class="col-12 align-self-center">
                                            <strong><label for="adress">Adresse postale</label></strong>
                                        </div>
                                        <div class="col-12 align-self-center">
                                            <input class="form-control <?= empty($user_info->users_address) ? 'is-invalid' : ''; ?>" id="adress" type="text" name="adress" value="<?= ($user_info->users_address) ?? ''; ?>" placeholder="">
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
</div>
</main>