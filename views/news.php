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
                            <div class="col-12 py-3 fst-italic">
                                <?= !empty($productInfo->products_description) ? $productInfo->products_description : "<span class='textUnknown'>Non renseignée</span>"; ?>
                            </div>
                            <div class="col-4 text-center align-self-center py-1">
                                <?= $productInfo->products_price ?? '' ?> €
                            </div>
                            <div class="col-4 text-center align-self-center py-1">
                                <?= ($productInfo->products_weight / 1000) ?? '' ?> Kg
                            </div>
                            <div class="col-4">
                                <div class="row px-3 my-2 text-end"><a class='text-black' href='informations_produit.html?id_product=<?= $productInfo->id_product; ?>' alt='Afficher les informations du produit' title='Afficher les informations du produit'>
                                        <lord-icon src="https://cdn.lordicon.com/dnmvmpfk.json" trigger="hover" colors="primary:#663300" style="width:25px;height:25px">
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
                <!------------- BOX EVENT --------->
                <div class="col-12 py-2">
                    <?php foreach ($eventsPending as $eventInfo) :
                        $start_date = new DateTime($eventInfo->events_start_date);
                        $start_date = $start_date->format('d-m-Y');
                        $end_date = new DateTime($eventInfo->events_end_date);
                        $end_date = $end_date->format('d-m-Y'); ?>
                        <div class="row mt-4 boxSubCategoryWhite">
                            <div class="col-12 fs-4 boxSubCategoryUp text-black py-2">
                                <?= $eventInfo->events_name ?? '' ?>
                            </div>
                            <?php
                            if ($start_date > date('d-m-Y')) { ?>
                                <div class="col-12 boxSubCategoryDownNOK py-1 text-center">
                                    <span class=''>&Eacute;vènement à venir</span>
                                </div>
                            <?php } elseif ($start_date <= date('d-m-Y') and $end_date >= date('d-m-Y')) { ?>
                                <div class="col-12 boxSubCategoryDownOK py-1 text-center">
                                    <span class=''>&Eacute;vènement en cours</span>
                                </div>
                            <?php } elseif ($end_date < date('d-m-Y')) { ?>
                                <div class="col-12 boxSubCategoryDownHS py-1 text-center">
                                    <span class=''>&Eacute;vènement terminé</span>
                                </div>
                            <?php } ?>
                            <div class="col-6 py-3 text-end">
                                Du <?= $start_date ?? '' ?>
                            </div>
                            <div class="col-6 py-3">
                                Au <?= $end_date ?? '' ?>
                            </div>
                            <div class="col-12 py-3 text-center fst-italic">
                                <?= $eventInfo->events_description ?? '' ?>
                            </div>
                            <?php
                            if (isset($eventInfo->id_product)) { ?>
                                <div class="col-12">
                                    <div class="row my-2">
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