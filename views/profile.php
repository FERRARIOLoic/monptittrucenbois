<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 pb-3 text-center align-self-center">
            <h1>Ma page profil</h1>
            <?php
            if ($_SESSION['user']->users_admin == 1 and $_SERVER['REQUEST_URI'] = "/profil.html") { ?>
                <a href="administrateur.html" alt='Afficher la vue administrateur' title='Afficher la vue administrateur' class='text-white'>Aller à la vue administrateur</a>
            <?php } ?>
        </div>

        <?php
        if (empty($user_info->users_lastname)) { ?>
    </div>
    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4 pb-5">
            Merci de compléter votre profil
        </div>
    </div>
<?php } ?>
<div class="row">
    <!------------- BOX ORDER PENDING NOT PAYED NOT MADE --------->
    <div class="col-12 col-md-8">
        <div class="row p-2 px-md-5">
            <div class="col-12">
                <div class='row '>
                    <div class="col-12 py-3 boxSubCategoryWhite text-center">
                        <h4>Commande en cours</h4>
                    </div>


                    <?php
                    if (!empty($orders_pending)) {
                        $orders_list = $orders_pending;
                    }



                    if (empty($orders_list)) { ?>
                        <div class="col-12 p-4 fs-6 text-center boxProfileOrderPending">
                            Aucune commande en cours
                        </div>
                    <?php } else { ?>
                        <div class="col-12 p-4 boxProfileOrderPending">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row p-2 px-md-5 border-bottom border-1 border-secondary">
                                        <div class="col-12 col-md-3 "><strong>Produit</strong></div>
                                        <div class="col-3 col-md-2 text-center text-md-end"><strong>Quantité</strong></div>
                                        <div class="col-5 col-md-3 text-center text-md-end"><strong>Prix unitaire</strong></div>
                                        <div class="col-4 col-md-2 text-center text-md-end"><strong>Prix total</strong></div>
                                    </div>
                                </div>

                                <?php
                                //------------- UNSET TOTALS ---------//

                                unset($order_number);
                                unset($order_weight);
                                unset($order_price_product);
                                unset($order_price_total);


                                foreach ($orders_list ?? [] as $order_info) :
                                    $order_number = ($order_number ?? 0) + ($order_info->orders_quantity);
                                    $order_weight = ($order_weight ?? 0) + ($order_info->orders_weight * $order_info->orders_quantity);
                                    $order_price_product = $order_info->orders_quantity * $order_info->orders_price;
                                    $order_price_total = ($order_price_total ?? 0) + $order_price_product;
                                ?>
                                    <div class="col-12  px-3 py-2 px-md-4">
                                        <div class="row py-1 boxContact">
                                            <div class="col-12 col-md-4 align-self-center">
                                                <?= $order_info->products_name ?>
                                            </div>
                                            <div class="col-3 col-md-1  text-center text-md-end align-self-center">
                                                <?= $order_info->orders_quantity ?>
                                            </div>
                                            <div class="col-5 col-md-2  text-center text-md-end align-self-center">
                                                <?= $order_info->orders_price ?>
                                            </div>
                                            <div class="col-4 col-md-2  text-center text-md-end align-self-center">
                                                <?= $order_price_product ?>
                                            </div>
                                            <?php if (($order_info->orders_payed == null and $order_info->orders_status == NULL)) { ?>
                                                <div class="col-6 col-md-2 pt-1 text-md-end align-self-center">
                                                    <button type='submit' class='btn btnValidSmallX' onclick="toggle_text('update_<?= $order_info->id_order ?>');" alt='Modifier la quantité' title='Modifier la quantité'>Modifier</button>
                                                </div>
                                                <div class="col-6 col-md-1 pt-1 text-end align-self-center">
                                                    <form action='' method='post'>
                                                        <input type='hidden' name='id_order' value='<?= $order_info->id_order; ?>'>
                                                        <button type='submit' class='btn btnValidSmallX' name='action_profile' value='delete' alt='Supprimer le produit' title='Supprimer le produit'>X</button>
                                                    </form>
                                                </div>
                                            <?php } elseif (($order_info->orders_payed == 1 and $order_info->orders_status == NULL)) { ?>
                                                <div class="col-1"></div>
                                                <div class="col-10 col-md-2 text-center boxSubCategoryNOK">En cours</div>
                                            <?php } elseif (($order_info->orders_payed == 1 and $order_info->orders_status == 1)) { ?>
                                                <div class="col-1"></div>
                                                <div class=" col-10 col-md-2 text-center boxSubCategoryOK">Fabriqué</div>
                                            <?php } ?>
                                        </div>
                                        <span id="update_<?= $order_info->id_order ?>" style="display:none;">
                                            <form action='' method='post' class='col-9 boxSubCategoryDown p-2 pe-3'>
                                                <input type='hidden' name='id_order' value='<?= $order_info->id_order; ?>'>
                                                <div class="row">
                                                    <div class="col-4 text-center align-self-center">
                                                        Quantité souhaitée
                                                    </div>
                                                    <div class="col-3 text-end align-self-center">
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
                                <?php endforeach;
                                $order_weight = $order_weight ?? 0 / 100;
                                ?>

                            </div>
                        </div>

                        <!------------- TOTAL PRODUCTS / WEIGHT --------->
                        <div class="col-12 py-3 boxProfileOrderPending">
                            <div class="row p-2 px-md-5">
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-9 text-end">Nombre total d'articles :</div>
                                        <div class="col-3 text-md-end"><strong><?= $order_number ?? '' ?></strong></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-9 text-end">Poids total de la commande :</div>
                                        <div class="col-3"><strong><?= $order_weight / 1000 ?? '' ?> kg</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($order_info->orders_payed) == NULL) { ?>
                            <!------------- LIST CHOICE CARRIER --------->
                            <div class="col-12 py-3 border-top border-1 boxProfileOrderPending">
                                <form action='' method='post' class='row'>
                                    <input type='hidden' name='id_order' value='<?= $order_info->id_order; ?>'>
                                    <input type='hidden' name='order_weight' value='<?= ceil($order_weight / 1000); ?>'>
                                    <div class="col-4 text-center align-self-center">Choix du transporteur :</div>
                                    <div class="col-4">
                                        <select class='form-select' name='id_carrier'>
                                            <option></option>
                                            <?php
                                            foreach ($carriers_list as $carrier_info) : ?>
                                                <option value='<?= $carrier_info->id_carrier ?>' <?= ($carrier_info->id_carrier == ($id_carrier ?? '')) ? 'selected' : ''; ?>><?= $carrier_info->carriers_name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-4 text-center">
                                        <button type='submit' class='btn btnValidSmall' name='action_profile' value='carrier_choice'>Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>

                        <!------------- TOTAL PRICE --------->
                        <div class="col-12 border-top border-1 py-3 boxProfileOrderPending">
                            <div class="row p-2 px-md-5">
                                <div class="col-12 col-md-5">
                                    <div class="row">
                                        <div class="col-8 text-end">Prix du transport : </div>
                                        <div class="col-4">
                                            <strong><?= $carriers_price->carriers_price ?? '' ?> €</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="row">
                                        <div class="col-9 text-end">Montant total de la commande : </div>
                                        <div class="col-3">
                                            <strong><?= ($order_price_total ?? 0) + ($carriers_price->carriers_price ?? 0) ?? '' ?> €</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php if (isset($order_info->orders_payed) == NULL) { ?>
                            <!------------- VALIDATE ORDER --------->
                            <div class="col-12 border-top border-1 py-3 boxProfileOrderPending">
                                <div class="row p-2 px-md-5">
                                    <div class="col-12 text-center">
                                        <form action='' method='post'>
                                            <input type='hidden' name='orders_number' value='MPTEB_<?= time(); ?>'>
                                            <button class='btn btnValid' name='action_profile' value='order_validate'>Confirmer la commande</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if (isset($order_info->orders_ship_number)) { ?>
                            <input type='hidden' name='id_order' value='<?= $order_info->id_order; ?>'>
                            <!------------- ORDER SHIP NUMBER --------->
                            <div class="col-12 border-top border-1 py-3">
                                <div class="row p-2 px-md-5">
                                    <div class="col-12 col-md-6">
                                        <div class="row py-3">
                                            <div class="col-6 text-end">Numéro de colis :</div>
                                            <div class="col-6"><strong><?= ($order_info->orders_ship_number) ?></strong></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                            <div class="col-12 text-center py-2"><a href=''><button class='btn btnValidSmall'>Suivre mon colis</button></a></div>
                                        </div>
                                    </div>
                                </div>
                                <form action='' method='post' class="row p-2 px-md-5 border-top border-1">
                                    <div class="col-12 text-center">
                                        <button type='submit' class='btn btnValid' name='action_profile' value='ship_received'>J'ai bien reçu mon colis</button>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <!------------- BOX ORDER PENDING PAYED OR/AND MADE --------->
    <div class="col-12 col-md-4">
        <div class="row p-2 px-md-2">
            <div class="col-12">
                <div class='row'>
                    <div class="col-12 py-3 boxSubCategoryWhite text-center">
                        <h4>Commande en préparation</h4>
                    </div>


                    <?php
                    // var_dump($orders_made);die;
                    if (empty($orders_made)) { ?>
                        <div class="col-12 p-4 fs-6 text-center boxProfileOrderPending">
                            Aucune commande en préparation
                        </div>
                    <?php } else { ?>
                        <div class="col-12 px-4 pt-3 boxProfileOrderPending">
                            <div class="row">

                                <?php
                                //------------- UNSET TOTALS ---------//

                                unset($order_number);
                                unset($order_weight);
                                unset($order_price_product);
                                unset($order_price_total);

                                if (!empty($orders_payed) or !empty($orders_made)) {
                                    $orders_list = $orders_made;
                                }
                                foreach ($orders_list as $order_info) :
                                    $order_number = ($order_number ?? 0) + ($order_info->orders_quantity);
                                    $order_weight = ($order_weight ?? 0) + ($order_info->orders_weight * $order_info->orders_quantity);
                                    $order_price_product = $order_info->orders_quantity * $order_info->orders_price;
                                    $order_price_total = ($order_price_total ?? 0) + $order_price_product;
                                ?>
                                    <div class="col-12  px-3 py-2 px-md-4">
                                        <div class="row py-1 ">
                                            <div class="col-10 py-1 align-self-center">
                                                <?= $order_info->products_name ?>
                                            </div>
                                            <div class="col-2 align-self-center">
                                                <?= $order_info->orders_quantity ?>
                                            </div>
                                            <?php if (($order_info->orders_payed == 1 and $order_info->orders_status == NULL)) { ?>
                                                <div class="col-12 text-center boxSubCategoryNOK">En cours</div>
                                            <?php } elseif (($order_info->orders_payed == 1 and $order_info->orders_status == 1)) { ?>
                                                <div class=" col-12 text-center boxSubCategoryOK">Fabriqué</div>
                                            <?php } ?>
                                        </div>
                                        <span id="update_<?= $order_info->id_order ?>" style="display:none;">
                                            <form action='' method='post' class='col-9 boxSubCategoryDown p-2 pe-3'>
                                                <input type='hidden' name='id_order' value='<?= $order_info->id_order; ?>'>
                                                <div class="row">
                                                    <div class="col-4 text-center align-self-center">
                                                        Quantité souhaitée
                                                    </div>
                                                    <div class="col-3 text-end align-self-center">
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
                                <?php
                                    $order_carrier_price = Carrier::getByID($order_info->id_carrier_price);
                                    $orders_number = $order_info->orders_number;
                                endforeach;
                                $order_weight = $order_weight ?? 0 / 100;
                                ?>

                            </div>
                        </div>

                        <!------------- TOTAL PRODUCTS / WEIGHT --------->
                        <div class="col-12 pt-1 boxProfileOrderPending">
                            <div class="row p-2">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-9 text-end">Nombre total d'articles :</div>
                                        <div class="col-3"><strong><?= $order_number ?? '' ?></strong></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-9 text-end">Poids total de la commande :</div>
                                        <div class="col-3"><strong><?= $order_weight / 1000 ?? '' ?> kg</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!------------- TOTAL PRICE --------->
                        <div class="col-12 border-top border-1 py-3 boxProfileOrderPending">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-9 text-end">Prix du transport : </div>
                                        <div class="col-3">
                                            <strong><?= $order_carrier_price->carriers_price ?? '' ?></strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-9 text-end">Montant total de la commande : </div>
                                        <div class="col-3">
                                            <strong><?= ($order_price_total ?? 0) + ($order_carrier_price->carriers_price ?? 0) ?? '' ?> €</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!------------- BOX ORDER SHIPPING --------->
    <div class="col-12 col-md-6">
        <div class="row p-2 px-md-5">
            <div class="col-12">
                <div class='row boxContact'>
                    <div class="col-12 py-3 boxSubCategoryWhite text-center">
                        <h4>Commande en livraison</h4>
                    </div>


                    <?php
                    // var_dump($orders_made);die;
                    if (empty($orders_shipped)) { ?>
                        <div class="col-12 p-4 fs-6 text-center boxProfileOrderPending">
                            Aucune commande en livraison
                        </div>
                    <?php } else { ?>
                        <div class="col-12 px-4">
                            <div class="row boxProfileOrderPending">

                                <?php
                                //------------- UNSET TOTALS ---------//

                                unset($order_number);
                                unset($order_weight);
                                unset($order_price_product);
                                unset($order_price_total);

                                if (!empty($orders_shipped)) {
                                    $orders_list = $orders_shipped;
                                }
                                foreach ($orders_list as $order_info) :
                                    $order_number = ($order_number ?? 0) + ($order_info->orders_quantity);
                                    $order_weight = ($order_weight ?? 0) + ($order_info->orders_weight * $order_info->orders_quantity);
                                    $order_price_product = $order_info->orders_quantity * $order_info->orders_price;
                                    $order_price_total = ($order_price_total ?? 0) + $order_price_product;
                                    $order_carrier_price = Carrier::getByID($order_info->id_carrier_price);
                                    $orders_order = $order_info->orders_number;
                                endforeach;
                                $order_weight = $order_weight ?? 0 / 100;
                                ?>

                            </div>
                        </div>

                        <!------------- TOTAL PRODUCTS / WEIGHT --------->
                        <div class="col-12 ">
                            <div class="row p-2">
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-5 text-end">Commande :</div>
                                        <div class="col-7"><strong><?= $orders_ship ?? '' ?></strong></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-9 text-end">Nombre total d'articles :</div>
                                        <div class="col-3"><strong><?= $order_number ?? '' ?></strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!------------- ORDER SHIP NUMBER --------->
                        <div class="col-12 border-top border-1 py-3">
                            <div class="row px-md-5">
                                <div class="col-12 col-md-8 align-self-center">
                                    <div class="row">
                                        <div class="col-6 text-end">Numéro de colis :</div>
                                        <div class="col-6"><strong><?= ($order_info->orders_ship_number) ?></strong></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 align-self-center">
                                    <div class="row">
                                        <div class="col-12 text-center py-2"><a href=''><button class='btn btnValidSmall'>Suivre mon colis</button></a></div>
                                    </div>
                                </div>
                            </div>
                            <form action='' method='post' class="row p-2 px-md-5 border-top border-1">
                                <input type='hidden' name='orders_number' value='<?= $orders_order ?? ''; ?>'>
                                <div class="col-12 pt-2 text-center">
                                    <button type='submit' class='btn btnValid' name='action_profile' value='ship_received'>J'ai bien reçu mon colis</button>
                                </div>
                            </form>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row my-5 px-2 px-md-5">
    <!------------- BOX PROFILE INFO --------->
    <div class="col-12 col-md-4">
        <div class="row p-2">
            <div class="col-12">
                <form action='' method='post' class='row boxProfileOrderPending'>
                    <div class="col-12 py-3 boxSubCategoryWhite text-center">
                        <h4>Mes informations de profil</h4>
                    </div>
                    <!------------- CATEGORY --------->
                    <div class="col-12 px-4 py-3">
                        <div class="row boxSubCategory py-2">
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
                    <div class="col-12 px-4">
                        <div class="row boxSubCategory py-2">
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
    <!------------- BOX PROFILE ADDRESSES --------->
    <div class="col-12 col-md-8">
        <div class="row p-2">
            <div class="col-12 boxContact">
                <div class='row'>
                    <div class="col-12 py-3 boxContactTitle text-center border-bottom border-1">
                        <h4>Mes adresses</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 px-4">
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

                    <div class="col-12 col-md-6 px-4">
                        <div class="row py-3">
                            <div class="col-12 py-3 boxSubCategoryUp boxContactTitle text-center border-bottom border-1">
                                Autres adresses de livraison
                            </div>
                            <div class="col-12 py-3 boxSubCategoryDown">
                                <div class="row">
                                    <div class="col-12">
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
    </div>
</main>