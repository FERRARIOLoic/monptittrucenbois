<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Actualités</h1>
        </div>
    </div>

    <div class="row descriptionPage">
        <div class="col-12 text-center align-self-center fs-4">
            Retrouvez les actualités, les dernières nouveautés, les derniers évènements...
            et les prochains !
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4 px-5 py-4">
            <!------------- BOX NEW THINGS--------->
            <div class="row boxContact">
                <div class="col-12 text-center align-self-center fs-3 py-3">
                    <h2>Nouveautés</h2>
                </div>
                <div class="col-12 border-1 border-secondary border-top py-3">
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
            <div class="row boxContact">
                <div class="col-12 text-center align-self-center fs-3 py-3">
                    <h2>Derniers ajouts</h2>
                </div>
                <div class="col-12 border-1 border-secondary border-top py-2 px-4">
                    <!------------- BOX EVENT --------->
                    <?php foreach ($ProductsLast as $productInfo) : ?>
                        <div class="row boxContact mt-4">
                            <div class="col-12">
                                <div class="row px-3 my-2">
                                    <div class="col-12 boxSubCategoryUp">
                                        Nom du produit<br>
                                    </div>
                                    <div class="col-12 boxSubCategoryDownWhite fs-4">
                                        <?= $productInfo->products_name ?? '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row px-3 my-2">
                                    <div class="col-12 boxSubCategoryUp">
                                        Catégorie<br>
                                    </div>
                                    <div class="col-12 boxSubCategoryDownWhite py-1">
                                        <?= $productInfo->categories_name ?? '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row px-3 my-2">
                                    <div class="col-12 boxSubCategoryUp">
                                        Bois utilisé<br>
                                    </div>
                                    <div class="col-12 boxSubCategoryDownWhite py-1">
                                        <?= $productInfo->woods_name ?? '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row px-3 my-2">
                                    <div class="col-12 boxSubCategoryUp">
                                        Description<br>
                                    </div>
                                    <div class="col-12 boxSubCategoryDownWhite py-1">
                                        <?= !empty($productInfo->products_description) ? $productInfo->products_description : "<span class='textUnknown'>Non renseignée</span>"; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row px-3 my-2">
                                    <div class="col-12 boxSubCategoryUp">
                                        Prix<br>
                                    </div>
                                    <div class="col-12 boxSubCategoryDownWhite py-1">
                                        <?= $productInfo->products_price ?? '' ?> €
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row px-3 my-2">
                                    <div class="col-12 boxSubCategoryUp">
                                        Poids<br>
                                    </div>
                                    <div class="col-12 boxSubCategoryDownWhite py-1">
                                        <?= $productInfo->products_weight ?? '' ?> Kg
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row px-3 my-2 text-center"><a class='text-black' href='informations_produit.html?id_product=<?= $productInfo->id_product; ?>'>
                                        <div class="col-12 boxSubCategoryWhite py-1">
                                            Fiche produit
                                        </div>
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
            <div class="row boxContact">
                <div class="col-12 text-center align-self-center fs-3 py-3">
                    <h2>Prochains évènements</h2>
                </div>
                <div class="col-12 border-1 border-secondary border-top py-2 px-4">
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