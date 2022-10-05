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
                        <form class="col-12" action="<?= isset($_POST['id_product']) ? 'administrateur.html?display=eventsCreate' : '' ?>" method="post" enctype="multipart/form-data">
                            <div class="row boxContact">
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group my-2">
                                                <label for="name">Titre de l'évènement</label>
                                                <input type="text" class="form-control" id="name" name="events_name" placeholder="Titre de l'évènement" value="<?= $eventInfo->products_name ?? '' ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group my-2">
                                                <label for="description">Description de l'évènement</label>
                                                <textarea class="form-control" id="description" name="events_description" rows="3" placeholder="Description de l'évènement"><?= $eventInfo->products_description ?? '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group my-2">
                                                <label for="events_start_date">Date de début</label>
                                                <input type='date' id='events_start_date' class='form-control' name='events_start_date' min='<?php echo date('Y-m-d');?>' alt="Date de début de l'évènement">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group my-2">
                                                <label for="events_end_date">Date de fin</label>
                                                <input type='date' id='events_end_date' class='form-control' name='events_end_date' alt="Date de début de l'évènement">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group my-2">
                                                <label for="id_product">Produit concerné</label>
                                                <select id='id_product' class="form-select" name="id_product" >
                                                    <option value='0'></option>
                                                    <?php foreach ($ProductsList as $product) : ?>
                                                        <option value="<?= $product->id_product; ?>"><?= $product->products_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group my-2">
                                                Image de l'évènement
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" id="image" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 text-center">
                                    <?php
                                    if (isset($_POST['id_product'])) { ?>
                                        <button type="submit" class="btn btnValid my-2" name='action_event' value='modify'><strong>Enregistrer les modifications</strong></button>
                                    <?php } else { ?>
                                        <button type="submit" class="btn btnValid my-2" name='action_event' value='create'><strong>Enregistrer l'évènement</strong></button>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>