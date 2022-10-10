<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <!------------- MENU ADMINISTRATEUR --------->
        <div class="col-12 offset-lg-2 col-10">
            <div class="row">
                <div class="col-12 py-4 text-center">
                    <h1><?= $pageTitle; ?></h1>
                </div>
                <div class=" col-12 px-4 py-3 p-md-5">
                    <!------------- BOX CATEGORY --------->
                    <div class="row">
                        <div class="col-12">
                            <?php foreach ($ordersNew as $order_info) : ?>
                                <form action='' method='' class="row boxContact py-3 mb-1">
                                    <div class="col-6 col-lg-3 align-self-center">
                                        <?= $order_info->products_name; ?>
                                    </div>
                                    <div class="col-6 col-lg-1 align-self-center">
                                        <?= $order_info->orders_quantity; ?>
                                    </div>
                                    <div class="col-6 col-lg-2 align-self-center">
                                        <?= $order_info->orders_date; ?>
                                    </div>
                                    <div class="col-6 col-lg-5 align-self-center">
                                        <?= $order_info->users_lastname; ?>
                                    </div>
                                    <div class="col-6 col-lg-1 align-self-center">
                                        <button type='submit' class='btn btnValidSmallX' name='action_order' value='new'>Relancer</button>
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