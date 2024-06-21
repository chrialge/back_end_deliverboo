const checkbox = document.getElementById('visibility-toggle');
//Imposto dei valori di default
checkbox.checked = false;
checkbox.value = '0';

console.log('Prima del ckick', checkbox.value);
checkbox.addEventListener('click', function () {
    if (this.checked) {
        
        this.value = '1'; // Imposta il valore a 1 se la checkbox è selezionata
        console.log('Dopo ckick', checkbox.value);
    } else {
        
        this.value = '0'; // Imposta il valore a 0 se la checkbox non è selezionata
        console.log('Dopo ckick', checkbox.value);
    }
});

//name checker
function check_name() {
    // Prendo l'elemento dell'errore
    let errorElement = document.getElementById("name_error");

    // Prendo l'elemento input per dargli o togliergli stile
    let input = document.getElementById("name");

    // Verifico se la lunghezza del nome è di almeno 8 caratteri
    if (input.value.length >= 3) {
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
}

//price checker
let check_price = function check_price() {
    // Prendo l'elemento
    let priceElement = document.getElementById('price');
    let priceStr = priceElement.value;
    let price = parseFloat(priceStr);
    //console.log(priceStr);

    let errorElement = document.getElementById("price_error");
    //console.log(isNumber(price));

    // Verifico che il prezzo non sia un numero non negativo
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

//ingredients checker
function check_ingredients() {
    // Prendo l'elemento dell'errore
    let errorElement = document.getElementById("ingredients_error");

    // Prendo l'elemento textarea per dargli o togliergli stile
    let input = document.getElementById("ingredients");

    // Verifico se la lunghezza degli ingredienti è di almeno 3 caratteri
    if (input.value.length >= 10) {
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
}


//verifiche prima di inviare il form
document.getElementById('register-submit-button').addEventListener('click', function (event) {
    // Controllo del nome
    if (!check_name()) {
        event.preventDefault();
    }

    // Controllo del prezzo
    if (!check_price()) {
        event.preventDefault();
    }

    // Controllo degli ingredienti
    if (!check_types()) {
        event.preventDefault();
    }

});