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
                    <!------------- BOX EVENT --------->
                    <?php foreach ($eventsPending as $eventInfo) :
                        $event_start_date = strtotime($eventInfo->events_start_date);
                        $event_end_date = strtotime($eventInfo->events_end_date);
                    ?>
                        <div class="row py-4">
                            <div class="col-12">
                                <div class="row boxContact">
                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row px-3 my-2">
                                                    <div class="col-12 boxSubCategoryUp">
                                                        Titre de l'évènement<br>
                                                    </div>
                                                    <div class="col-12 boxSubCategoryDownGrey fs-4">
                                                        <?= $eventInfo->events_name ?? '' ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row px-3 my-2">
                                                    <div class="col-12 boxSubCategoryUp">
                                                        Date de début<br>
                                                    </div>
                                                    <div class="col-12 boxSubCategoryDownGrey py-1">
                                                        <?= $eventInfo->events_start_date ?? '' ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row px-3 my-2">
                                                    <div class="col-12 boxSubCategoryUp">
                                                        Date de fin<br>
                                                    </div>
                                                    <div class="col-12 boxSubCategoryDownGrey py-1">
                                                        <?= $eventInfo->events_end_date ?? '' ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row px-3 my-2">
                                                    <div class="col-12 boxSubCategoryUp">
                                                        Description de l'évènement<br>
                                                    </div>
                                                    <div class="col-12 boxSubCategoryDownGrey py-1">
                                                        <?= $eventInfo->events_description ?? '' ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row px-3 my-2">
                                                    <div class="col-12 boxSubCategoryUp">
                                                        Produit concerné<br>
                                                    </div>
                                                    <div class="col-12 boxSubCategoryDownGrey py-1">
                                                        <?= $eventInfo->products_name ?? '' ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="row px-3 my-2">
                                                    <div class="col-12 boxSubCategoryUp">
                                                        Statut de l'évènement<br>
                                                    </div>
                                                    <?php
                                                    if ($event_start_date > time()) { ?>
                                                        <div class="col-12 boxSubCategoryDownNOK py-1 text-center">
                                                            <span class=''>&Eacute;vènement à venir</span>
                                                        </div>
                                                    <?php } elseif ($event_start_date <= time() and $event_end_date >= time()) { ?>
                                                        <div class="col-12 boxSubCategoryDownOK py-1 text-center">
                                                            <span class=''>&Eacute;vènement en cours</span>
                                                        </div>
                                                    <?php } elseif ($event_end_date < time()) { ?>
                                                        <div class="col-12 boxSubCategoryDownHS py-1 text-center">
                                                            <span class=''>&Eacute;vènement terminé</span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 py-3">
                                        <div class="row">
                                            <div class="col-12">
                                                Image de l'évènement
                                            </div>
                                            <div class="col-12">
                                                <input type="file" class="form-control-file" id="image" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</main>