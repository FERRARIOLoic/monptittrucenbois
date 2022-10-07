<main class="container-fluid">
    <div class="row titlePage pt-3 px-4">
        <div class=" col-12 offset-md-3 col-md-6 px-4 py-3 text-center border-bottom border-1">
            <h1>Actualités</h1>
        </div>
    </div>

    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4 py-3">
            Retrouvez les actualités, les dernières nouveautés, les derniers évènements...
            et les prochains !
        </div>
    </div>

    <div class="row">
        <!------------- BOX NEW THINGS--------->
        <div class="col-12 col-md-4 px-5 py-4">
            <div class="row">
                <div class="col-12 text-center align-self-center fs-3 py-3 boxSubCategoryWhite">
                    <h2>Nouveautés</h2>
                </div>
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 py-2">Nouveauté 1</div>
                        <div class="col-12 py-2">Nouveauté 2</div>
                        <div class="col-12 py-2">Nouveauté 3</div>
                        <div class="col-12 py-2">Nouveauté 4</div>
                    </div>
                </div>
            </div>
        </div>

        <!------------- BOX NEW PRODUCT --------->
        <div class="col-12 col-md-4 px-5 py-4">
            <div class="row">
                <div class="col-12 text-center align-self-center fs-3 py-3 boxSubCategoryWhite">
                    <h2>Derniers ajouts</h2>
                </div>
                <!------------- BOX EVENT --------->
                <div class="col-12 py-2">
                    <?php foreach ($ProductsLast as $productInfo) : ?>
                        <div class="row mt-4 boxSubCategoryWhite">
                            <div class="col-12 fs-4 boxSubCategoryUp text-black py-2">
                                <?= $productInfo->products_name ?? '' ?>
                            </div>
                            <div class="col-12 col-md-6 py-3">
                                <?= $productInfo->categories_name ?? '' ?>
                            </div>
                            <div class="col-12 col-md-6 py-3">
                                <?= $productInfo->woods_name ?? '' ?>
                            </div>
                            <div class="col-12 py-3">
                                <i><?= !empty($productInfo->products_description) ? $productInfo->products_description : "<span class='textUnknown'>Non renseignée</span>"; ?></i>
                            </div>
                            <div class="col-4 text-center align-self-center py-1">
                                <?= $productInfo->products_price ?? '' ?> €
                            </div>
                            <div class="col-4 text-center align-self-center py-1">
                                <?= ($productInfo->products_weight / 1000) ?? '' ?> Kg
                            </div>
                            <div class="col-4">
                                <div class="row px-3 my-2 text-end"><a class='text-black' href='informations_produit.html?id_product=<?= $productInfo->id_product; ?>' alt='Afficher les informations du produit' title='Afficher les informations du produit'>
                                        <lord-icon src="https://cdn.lordicon.com/dnmvmpfk.json" trigger="hover" colors="primary:#663300">
                                        </lord-icon>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!------------- BOX NEXT EVENT --------->
        <div class="col-12 col-md-4 px-5 py-4">
            <div class="row">
                <div class="col-12 text-center align-self-center fs-3 py-3 boxSubCategoryWhite">
                    <h2>&Eacute;vènements</h2>
                </div>
                <div class="col-12 py-2 px-4">
                    <!------------- BOX EVENT --------->
                    <?php foreach ($eventsPending as $eventInfo) :
                        $event_start_date = strtotime($eventInfo->events_start_date);
                        $event_end_date = strtotime($eventInfo->events_end_date); ?>
                        <div class="row boxContact mt-4">
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
                            <?php if ($event_start_date > time()) { ?>
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
                            <?php } else { ?>
                                <div class="col-12 col-md-6">
                                    <div class="row px-3 my-2">
                                        <div class="col-12 boxSubCategoryUp">
                                            Date de début<br>
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
                            <?php } ?>
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
                            <?php
                            if (isset($eventInfo->id_product)) { ?>
                                <div class="col-12">
                                    <div class="row px-3 my-2">
                                        <div class="col-12 boxSubCategoryUp">
                                            Produit concerné<br>
                                        </div>
                                        <div class="col-12 boxSubCategoryDownGrey py-1">
                                            <?= $eventInfo->products_name ?? '' ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</main>