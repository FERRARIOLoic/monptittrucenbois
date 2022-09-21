<main class="container-fluid">

    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Page administrateur / <?= $pageTitle; ?></h1>
        </div>
    </div>

    <div class="row descriptionPage text-center fs-4">
        <?php
        $productsListAll = $pdo->query("SELECT 
                                            `products`.`products_name`,
                                            `products`.`products_description`,
                                            `products`.`products_price`,
                                            `products`.`products_height`,
                                            `products`.`products_weight`,
                                            `products_categories`.`category`,
                                            `woods`.`woods_name`
                                            FROM `products` 
                                                INNER JOIN `products_categories` ON `products`.`id_product_category` = `products_categories`.`id_product_category`
                                                INNER JOIN `woods` ON `products`.`id_wood` = `woods`.`id_wood`
                                                ORDER BY `products_name`");
        foreach ($productsListAll as $value) : 
        // var_dump($value['woods_name']);
        // die;
        
        ?>
            <div class="col-12 boxContact my-3">
                <div class="row">
                    <div class="col-4 py-2"><?= $value['products_name']; ?></div>
                    <div class="col-4 py-2"><?= $value['products_price']; ?>€</div>
                    <div class="col-4 py-2"><?= $value['products_height']; ?> cm / <?= $value['products_weight']; ?> kg</div>
                    <div class="col-12 py-2"><?= $value['products_description']; ?></div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>

</main>