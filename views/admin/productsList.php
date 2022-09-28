<main class="container-fluid">
    <div class="row">
        <?php include(__DIR__ . '/menu.php'); ?>

        <?php foreach ($categoriesList as $category) : ?>
            <div class="col-12 offset-md-1 col-md-10 py-3">
                <div class="row">
                    <div class="col-12">
                        <div class="row boxContact py-3">
                            <div class="col-12 py-2 text-center">
                                <h3><?= $category->categories_name; ?></h3>
                            </div>
                            <input type="hidden" name="id_category" value="<?= $category->id_category; ?>">
                            <div class="row py-2">
                                <div class="col-7 align-self-center">
                                    <input type="text" class="form-control" name="category_name" value="<?= $category->categories_name; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</main>