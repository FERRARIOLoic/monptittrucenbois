<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_wood = htmlspecialchars($_POST['id_wood']);
    $woods_name = htmlspecialchars($_POST['woods_name']);
    if (isset($id_wood) and isset($woods_name)) {
        $updateWood = $pdo->prepare("UPDATE `woods` SET `woods_name` = $woods_name WHERE `id_wood` = $id_wood");
        $updateWood->execute(['woods_name' => $woods_name]);
        var_dump($updateWood);
        die;
    }
}

?>


<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Page administrateur / <?= $pageTitle; ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="offset-md-1 col-12 col-md-5 text-center align-self-center">
            <div class="row boxContact">
                <div class="col-12 text-center align-self-center ">
                    <h2>Type de bois</h2>
                </div>
                <div class="col-12 text-start">
                    <?php
                    $woodTypes = $pdo->query("SELECT `id_wood`, `woods_name` FROM `woods`");
                    foreach ($woodTypes as $woodType) : ?>

                        <form action="" method="post">
                            <input type="hidden" name="admin_view" value="dataModify">
                            <input type="hidden" name="id_wood" value="<?= $woodType['id_wood']; ?>">
                            <div class="row py-2">
                                <div class="col-8 align-self-center">
                                    <input type="text" name="woods_name" value="<?= $woodType['woods_name']; ?>">
                                </div>
                                <div class="col-4 align-self-center">
                                    <input type="submit" class="btn btnValid" value="Modifier">
                                </div>
                            </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="offset-md-1 col-12 col-md-5 text-center align-self-center">
            <div class="row boxContact">
                <div class="col-12 text-center align-self-center ">
                    <h2>Type de bois</h2>
                </div>
            </div>
        </div>
    </div>
</main>