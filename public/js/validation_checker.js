function isNumber(value) {
    return typeof value === 'number' && !isNaN(value);
}


//psw checker
let check_pw = function check_pw() {
    // Prendo l'elemento dell'errore
    let errorElement = document.getElementById("password_error");

    // Prendo l'elemento confirm password per dargli o toglierli stile
    let input = document.getElementById("password-confirm");

    // Verifico se le password coincidono
    if (document.getElementById('password').value === document.getElementById('password-confirm').value) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        input.style.borderColor = "";

        return true;
    } else {
        errorElement.classList.remove("small_invisible");
        errorElement.classList.add("small_visible");
        input.style.borderColor = "red";

        return false;
    }
};

//vat number checker
let check_vat_number = function check_vat_number() {
    let vatElement = document.getElementById('vat_number');

    //Assegno il valore (una striga)
    let vatNumberStr = vatElement.value;

    //Lo visualizzo
    //console.log(vatNumberStr);

    let errorElement = document.getElementById("vat_number_error");
    //console.log(isNumber(parseInt(vatNumberStr)));

    //Se l'elemento stringa è lungo 11 e contiene solo numeri maggiori di 0 
    if (vatNumberStr.length === 11 && isNumber(parseInt(vatNumberStr)) && (parseInt(vatNumberStr) > 0)) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        vatElement.style.borderColor = "";

        return true;
    } else {
        errorElement.classList.remove("small_invisible");
        errorElement.classList.add("small_visible");
        vatElement.style.borderColor = "red";

        return false;
    }
};

//types checker
let check_types = function check_types() {
    let selectedCheckboxes = document.querySelectorAll('input[name="types[]"]:checked');
    let errorElement = document.getElementById("types_error");
    console.log(selectedCheckboxes);

    // verifico che almeno un tipo sia selezionato
    if (selectedCheckboxes.length > 0) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");

        return true;
    } else {
        errorElement.classList.remove("small_invisible");
        errorElement.classList.add("small_visible");

        return false;
    }
};



document.getElementById('register-submit-button').addEventListener('click', function (event) {
    
    // Controllo della password
    if (!check_pw()) {
        event.preventDefault();
        return;
    }

    // Controllo della se c'è almeno un type
    if (!check_types()) {
        event.preventDefault();
        return;
    }

    // Controllo del numero di partita IVA
    if (!check_vat_number()) {
        event.preventDefault();
        return;
    }
});



//price checker
let check_price = function check_price() {
    let priceElement = document.getElementById('price');
    let priceStr = priceElement.value;
    let price = parseFloat(priceStr);
    //console.log(priceStr);

    let errorElement = document.getElementById("price_error");
    //console.log(isNumber(price));

    // verifico che il prezzo non sia un numero non negativo
    if (isNumber(price) && price >= 0) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        priceElement.style.borderColor = "";

        return true;
    } else {
        errorElement.classList.remove("small_invisible");
        errorElement.classList.add("small_visible");
        priceElement.style.borderColor = "red";

        return false;
    }
};

