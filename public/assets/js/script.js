/*------------- INCLUDE HEADER ---------*/
function headerInclude() {
    var z, i, elmnt, file, xhttp;
    /* Loop through a collection of all HTML elements: */
    z = document.getElementsByTagName("*");
    for (i = 0; i < z.length; i++) {
        elmnt = z[i];
        /*search for elements with a certain atrribute:*/
        file = elmnt.getAttribute("header_include");
        if (file) {
            /* Make an HTTP request using the attribute value as the file name: */
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        elmnt.innerHTML = this.responseText;
                    }
                    if (this.status == 404) {
                        elmnt.innerHTML = "Page not found.";
                    }
                    /* Remove the attribute, and call this function once more: */
                    elmnt.removeAttribute("header_include");
                    includeHTML();
                }
            }
            xhttp.open("GET", file, true);
            xhttp.send();
            /* Exit the function: */
            return;
        }
    }
}

/*------------- INCLUDE FOOTER ---------*/
function modalInclude() {
    var z, i, elmnt, file, xhttp;
    /* Loop through a collection of all HTML elements: */
    z = document.getElementsByTagName("*");
    for (i = 0; i < z.length; i++) {
        elmnt = z[i];
        /*search for elements with a certain atrribute:*/
        file = elmnt.getAttribute("modal_include");
        if (file) {
            /* Make an HTTP request using the attribute value as the file name: */
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        elmnt.innerHTML = this.responseText;
                    }
                    if (this.status == 404) {
                        elmnt.innerHTML = "Page not found.";
                    }
                    /* Remove the attribute, and call this function once more: */
                    elmnt.removeAttribute("modal_include");
                    includeHTML();
                }
            }
            xhttp.open("GET", file, true);
            xhttp.send();
            /* Exit the function: */
            return;
        }
    }
}


/*------------- CONNECT VUE ---------*/

let connectVueInscription = () => {
    connectVue.innerHTML = `
    <div id="cartVueModal">
        <div class="row pt-3">
            <div class="col-12 col-md-5 px-4 py-2">
                Identifiant
            </div>
            <div class="col-12 col-md-7 px-4 py-2">
                <input type="text" class="inputText">
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12 col-md-5 px-4 py-2">
                Adresse email
            </div>
            <div class="col-12 col-md-7 px-4 py-2">
                <input type="email" class="inputText">
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12 col-md-5 px-4 py-1 pt-2">
                Mot de passe
            </div>
            <div class="col-12 col-md-7 px-4 py-1">
                <input type="text" class="inputText">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 px-4 py-1">
                Confirmer le Mot de passe
            </div>
            <div class="col-12 col-md-7 px-4 py-1">
                <input type="text" class="inputText">
            </div>
        </div>
    </div>
    <div id="cartFooterVue" class="border-1 border-top p-3">
        <div class="row">
            <div class="col-12 text-end order-1">
                <button type="submit" class="btn btn-secondary">Créer un compte</button>
            </div>
        </div>
    </div>
    `;
}
let connectVueConnexion = () => {
    connectVue.innerHTML = `
    <div id="cartVueModal">
        <div class="row pt-3">
            <div class="col-12 col-md-5 px-4 py-2">
                Identifiant
            </div>
            <div class="col-12 col-md-7 px-4 py-2">
                <input type="text" class="inputText">
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12 col-md-5 px-4 py-2">
                Mot de passe
            </div>
            <div class="col-12 col-md-7 px-4 py-2">
                <input type="text" class="inputText">
            </div>
        </div>
    </div>
    <div id="cartFooterVue" class="border-1 border-top p-3">
        <div class="row">
            <div class="col-12 text-end order-1">
                <button type="submit" class="btn btn-secondary">Se connecter</button>
            </div>
        </div>
    </div>
    `;
}



/*------------- BUTTONS ADD EVENT LISTENER ---------*/

btnInscription.addEventListener('click', connectVueInscription);
btnConnexion.addEventListener('click', connectVueConnexion);