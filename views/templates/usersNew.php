<main class="container-fluid">
    <div class="row titlePage">
        <div class="col-12 text-center align-self-center">
            <h1>Page administrateur / <?= $pageTitle; ?></h1>
        </div>
    </div>
    <div class=" col-12 px-4 py-3 p-md-5">
        <!------------- BOX CATEGORY --------->
        <div class="row boxContact">
            <div class="col-12 text-center align-self-center py-3">
                <h4>Créer un nouvel utilisateur</h4>
            </div>
            <div class="col-12 col-md-4">
                <label for="users_lastname">Nom</label>
                <input type="text" name="users_lastname" id="users_lastname" class="form-control">
            </div>
            <div class="col-12 col-md-4">
                <label for="users_firstname">Prénom</label>
                <input type="text" name="users_firstname" id="users_firstname" class="form-control">
            </div>
        </div>
    </div>
</main>