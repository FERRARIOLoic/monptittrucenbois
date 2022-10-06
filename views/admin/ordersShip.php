<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="col-12 offset-md-2 col-md-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>
                <div class=" col-12 px-4 py-3 p-md-5">
                    <!------------- BOX CATEGORY --------->
                    <div class="row">
                        <div class="col-12 boxContact">
                            <?php foreach ($ordersShip as $order_info) :
                                $ordersPendingById = Order::getPending($order_info->id_user, 1, 1, 0, 0); 
                                ?>
                                <form action='administrateur.html?display=ordersShip' method='post' class="row py-3 mb-1">
                                    <input type='hidden' name='orders_number' value='<?= $order_info->orders_number; ?>'>
                                    <div class="col-12 col-md-6 fs-4">
                                        <strong><?= $order_info->users_lastname; ?> <?= $order_info->users_firstname; ?></strong>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type='text' name='orders_ship_number' class='form-control' alt='Numéro de colis' placeholder='Numéro de colis...' value='<?= ($order_info->orders_ship_number)??'';?>'>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <button type='submit' class='btn btnValidSmall' name='action_order' value='ship_number' alt='Enregistrer le numéro de colis'>Enregistrer</button>
                                    </div>
                                </form>
                                <div class="row py-2 mb-1 border-top border-1">
                                    <?php foreach ($ordersPendingById as $order_info) :
                                        $order_number = ($order_number ?? 0) + ($order_info->orders_quantity);
                                        $order_weight = ($order_weight ?? 0) + ($order_info->orders_weight * $order_info->orders_quantity);
                                        $order_price_product = $order_info->orders_quantity * $order_info->orders_price;
                                        $order_price_total = ($order_price_total ?? 0) + $order_price_product;
                                    ?>
                                        <div class="col-12 col-md-3">
                                            <div class="row px-4">
                                                <div class="col-12 m-3 px-4 boxContact">
                                                    <div class="row p-2 mb-1">
                                                        <input type='hidden' name='id_order' value='<?= $order_info->id_order; ?>'>
                                                        <div class="col-10 align-self-center">
                                                            <?= $order_info->products_name; ?>
                                                        </div>
                                                        <div class="col-2 align-self-center">
                                                            <?= $order_info->orders_quantity; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="row py-3 mb-1 border-top border-1">
                                    <!------------- TOTAL PRODUCTS / WEIGHT --------->
                                    <div class="col-12 col-md-4">
                                        <div class="row">
                                            <div class="col-9 text-end">Nombre total d'articles :</div>
                                            <div class="col-3"><strong><?= $order_number ?? '' ?></strong></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="row">
                                            <div class="col-9 text-end">Poids total de la commande :</div>
                                            <div class="col-3"><strong><?= $order_weight / 1000 ?? '' ?> kg</strong></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="row">
                                            <div class="col-9 text-end">Montant total de la commande :</div>
                                            <div class="col-3"><strong><?= $order_price_total ?? '' ?> €</strong></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>