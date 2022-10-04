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
                            <?php foreach ($ordersDelivery as $order_info) :
                                $ordersPendingById = Order::getPending($order_info->id_user, 0); ?>
                                <form action='' method='' class="row boxContact py-3 mb-1">
                                    <div class="col-12">
                                        <?= $order_info->users_lastname; ?> <?= $order_info->users_firstname; ?> 
                                    </div>
                                    <div class="col-12 px-4">

                                        <?php foreach ($ordersPendingById as $order_info) : ?>
                                            <div class="row boxContact p-2 mb-1">
                                                <input type='hidden' name='id_order' value='<?= $order_info->id_order; ?>'>
                                                <div class="col-3 align-self-center">
                                                    <?= $order_info->products_name; ?>
                                                </div>
                                                <div class="col-1 align-self-center">
                                                    <?= $order_info->orders_quantity; ?>
                                                </div>
                                                <div class="col-2 align-self-center">
                                                    <?= $order_info->orders_date; ?>
                                                </div>
                                                <div class="col-5 align-self-center">
                                                    <?= $order_info->users_lastname; ?>
                                                </div>
                                                <div class="col-1 align-self-center">
                                                    <?php if (!isset($order_info->orders_status)) { ?>
                                                        <button type='submit' class='btn btnValidSmallX' name='action_order' value='made'>Terminé</button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>