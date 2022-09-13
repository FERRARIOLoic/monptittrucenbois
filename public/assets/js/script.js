

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
    btnInscriptionModal.classList.add('bigifyTextSelected');
    connectVueModal.innerHTML = `
    <form action="creer_utilisateur.html" method="post">
        <div id="cartVueModal">
            <div class="row pt-3">
                <div class="col-12 px-4 pt-2">
                    Adresse mail
                </div>
                <div class="col-12 px-4 pb-2">
                    <input type="text" name="mail" class="inputText">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12 px-4 pt-2">
                    Mot de passe
                </div>
                <div class="col-12 px-4">
                    <input type="password" name="password" class="inputText">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12 px-4">
                    Confirmer le mot de passe
                </div>
                <div class="col-12 px-4 pb-2">
                    <input type="password" name="passwordConfirm" class="inputText">
                </div>
            </div>
        </div>
        <div id="cartFooterVue" class="border-1 border-top p-3 mt-5">
            <div class="row">
                <div class="col-12 text-end order-1">
                    <button type="submit" class="btn btn-secondary">Valider l'inscription</button>
                </div>
            </div>
        </div>
        </form>`;
});

//------------- CONNEXION ---------//
btnConnexionModal.addEventListener('click', () => {
    btnConnexionModal.classList.add('bigifyTextSelected');
    btnInscriptionModal.classList.remove('bigifyTextSelected');
    connectVueModal.innerHTML = `
    <div id="cartVueModal">
        <div class="row pt-3">
            <div class="col-12 px-4 pt-2">
                Adresse mail
            </div>
            <div class="col-12 px-4 pb-2">
                <input type="text" name="username" class="inputText">
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12 px-4 pt-2">
                Mot de passe
            </div>
            <div class="col-12 px-4 pb-2">
                <input type="password" name="password" class="inputText">
            </div>
        </div>
    </div>
    <div id="cartFooterVue" class="border-1 border-top p-3 mt-5">
        <div class="row">
            <div class="col-12 text-end order-1">
                <button type="submit" class="btn btn-secondary">Se connecter</button>
            </div>
        </div>
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

