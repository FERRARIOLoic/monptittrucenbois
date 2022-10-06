

//------------ HIDE SHOW NAVBAR ---------//
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").classList.add('navbarScrollShow');
        document.getElementById("navbar").classList.remove('navbarScrollHide');
    } else {
        document.getElementById("navbar").classList.add('navbarScrollHide');
        document.getElementById("navbar").classList.remove('navbarScrollShow');
        document.getElementById("navbarSupportedContent").classList.remove('show');
    }
    prevScrollpos = currentScrollPos;
}


//------------- SHOW HIDE BOX ---------//
function toggle_text(id) {
    var span = document.getElementById(id);
    if (span.style.display == "none") {
        span.style.display = "inline";
    } else {
        span.style.display = "none";
    }
}



//------------- INSCRIPTION ---------//
btnInscriptionModal.addEventListener('click', () => {
    btnConnexionModal.classList.remove('bigifyTextSelected');
    btnConnexionModal.classList.remove('boxSubCategoryWhite');
    btnInscriptionModal.classList.add('bigifyTextSelected');
    btnInscriptionModal.classList.add('boxSubCategoryWhite');
    connectVueModal.innerHTML = `
    <form action="inscription.html" method="post" class=' fadeInTop'>
        <div id="cartVueModal">
            <div class="form-floating">
                <input type="email" autocomplete="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" required placeholder="email" />
                <label for="email" class="form-label px-4 boxContactTitle">Adresse mail*</label>
                <div class="error"><?= $errors['email'] ?? '' ?></div>
            </div>
        
            <div class="form-floating">
                <input type="password" autocomplete="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" name="password" required placeholder="password" />
                <label for="password" class="form-label px-4 boxContactTitle">Mot de passe*</label>
                <div class="error"><?= $errors['password'] ?? '' ?></div>
            </div>
        
            <div class="form-floating mb-5">
                <input type="password" autocomplete="password_verif" class="form-control <?= isset($errors['password_verif']) ? 'is-invalid' : '' ?>" id="password_verif" name="password_verif" required placeholder="password_verif" />
                <label for="password_verif" class="form-label px-4 boxContactTitle">Confirmer le mot de passe*</label>
                <div class="error"><?= $errors['password_verif'] ?? '' ?></div>
            </div>
            <div class="col-12 text-center mb-5">
            <button class="btn btnValid" type="submit"><strong>Inscription</strong></button>
            </div>
        </div>
        </form>`;
});

//------------- CONNEXION ---------//
btnConnexionModal.addEventListener('click', () => {
    btnConnexionModal.classList.add('bigifyTextSelected');
    btnConnexionModal.classList.add('boxSubCategoryWhite');
    btnInscriptionModal.classList.remove('bigifyTextSelected');
    btnInscriptionModal.classList.remove('boxSubCategoryWhite');
    connectVueModal.innerHTML = `
    <div id="cartVueModal">
    <form class="mb-5 fadeInTop" method="POST" action="connexion.html">

        <div class="error"><?= $errors['global'] ?? '' ?></div>

        <div class="form-floating">
            <input type="email" autocomplete="email" class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>" id="email" name="email" required placeholder="email" />
            <label for="email" class="form-label px-4 boxContactTitle">Adresse mail*</label>
        </div>

        <div class="form-floating mb-5">
            <input type="password" value="" class="form-control <?= isset($errors['global']) ? 'is-invalid' : '' ?>" id="password" required name="password" placeholder="*****" />
            <label for="password" class="form-label px-4 boxContactTitle">Mot de passe*</label>
        </div>
        <div class="col-12 text-center mb-5">
        <button class="btn btnValid" type="submit"><strong>Connexion</strong></button>
    </div>
    </form>
    </div>`;
});

//------------- BUTTON PRODUCT INFO ---------//
btnProductInfo.addEventListener('click', () => {
    console.log('btnProductInfo');
    productInfoVue.innerHTML = `
    <div class="row boxContact boxProductVue mx-md-5">
    <div class="col-12 text-center align-self-center fs-3 py-3">
        <h2>Boite</h2>
    </div>
    <div class="col-12 py-3 boxProductVue text-center">
        <strong>10cm de hauteur, Motif pyrogravé, verni, réalisé en deux modèles</strong>
    </div>
    <div class="col-12 col-md-5 border-2 border-secondary border-top py-3 boxProductVue">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-2 text-center"><strong>Modèle rond - 40€</strong></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 py-2">
                        <img class="productImg" src="../public/assets/img/products/box/boxBig_01.jpg">
                    </div>
                    <div class="col-6 py-2 align-self-center">Nuage de papillons</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 py-2">
                <img class="productImg" src="../public/assets/img/products/box/boxBig_02.jpg">
            </div>
            <div class="col-6 py-2 align-self-center">Papillon</div>
        </div>
    </div>`;
});

