function isNumber(value) {
    return typeof value === 'number' && !isNaN(value);
}
/* 1-FUNZIONI DI VALIDAZIONE
   2-FUNZIONI NASCONDI-ERRORE
   3-CHECKER PER IL FORM
*/


// 1 FUNZIONI DI VALIDAZIONE
//name
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

//last_name
function check_last_name() {
    // Prendo l'elemento dell'errore
    let errorElement = document.getElementById("last_name_error");

    // Prendo l'elemento input per dargli o togliergli stile
    let input = document.getElementById("last_name");

    // Verifico se la lunghezza del cognome è di almeno 3 caratteri
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

//mail
function check_email() {
    // Prendo l'elemento dell'errore
    let errorElement = document.getElementById("email_error");

    // Prendo l'elemento input per dargli o togliergli stile
    let input = document.getElementById("email");

    // Verifico se la lunghezza dell'email è di almeno 3 caratteri e contiene una chiocciola (@)
    if (input.value.length >= 3 && input.value.includes('@')) {
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

//psw checker
let check_pw = function check_pw() {
    // Prendo l'elemento dell'errore
    let errorElement = document.getElementById("password_error");

    // Prendo l'elemento confirm password per dargli o togliergli stile
    let input = document.getElementById("password-confirm");

    // Prendo l'elemento password per verificare se è vuoto
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('password-confirm').value;

    // Verifico se la password non è vuota e se le password coincidono
    if (confirmPassword === "") {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        input.style.borderColor = "";
        return true;
    } else if (password !== "" && password === confirmPassword) {
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

//name restaurant
function check_name_restaurant() {
    // Prendo l'elemento dell'errore
    let errorElement = document.getElementById("name_restaurant_error");

    // Prendo l'elemento input per dargli o togliergli stile
    let input = document.getElementById("name_restaurant");

    // Verifico se la lunghezza del nome del ristorante è di almeno 3 caratteri
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

//types checker
let check_types = function check_types() {
    let selectedCheckboxes = document.querySelectorAll('input[name="types[]"]:checked');
    let errorElement = document.getElementById("types_error");
    console.log(selectedCheckboxes);

    // Verifico che almeno un tipo sia selezionato
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

//Verifico che tutti i checker vadano bene
document.getElementById('register-submit-button').addEventListener('click', function (event) {
    // Controllo del nome
    if (!check_name()) {
        event.preventDefault();
    }

    // Controllo del cognome
    if (!check_last_name()) {
        event.preventDefault();
    }

    // Controllo dell'email
    if (!check_email()) {
        event.preventDefault();
    }

    // Controllo della password
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('password-confirm').value;
    let errorElement = document.getElementById("password_error");
    let input = document.getElementById("password-confirm");

    if (password === "" || confirmPassword === "" || password !== confirmPassword) {
        errorElement.classList.remove("small_invisible");
        errorElement.classList.add("small_visible");
        input.style.borderColor = "red";
        event.preventDefault();
    } else {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        input.style.borderColor = "";
    }

    // Controllo del nome del ristorante
    if (!check_name_restaurant()) {
        event.preventDefault();
    }

    // Controllo dei tipi
    if (!check_types()) {
        event.preventDefault();
    }

    // Controllo del numero di partita IVA
    if (!check_vat_number()) {
        event.preventDefault();
    }
});




// 2 FUNZIONE NASCONDI ERRORE
// Funzione per nascondere l'errore del nome
function hide_name_error() {
    let errorElement = document.getElementById("name_error");
    let input = document.getElementById("name");

    if (input.value.length >= 3) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        input.style.borderColor = "";
    }
}

// Funzione per nascondere l'errore del cognome
function hide_last_name_error() {
    let errorElement = document.getElementById("last_name_error");
    let input = document.getElementById("last_name");

    if (input.value.length >= 3) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        input.style.borderColor = "";
    }
}

// Funzione per nascondere l'errore dell'email
function hide_email_error() {
    let errorElement = document.getElementById("email_error");
    let input = document.getElementById("email");

    if (input.value.length >= 3 && input.value.includes('@')) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        input.style.borderColor = "";
    }
}

// Funzione per nascondere l'errore della password
function hide_password_error() {
    let errorElement = document.getElementById("password_error");
    let input = document.getElementById("password-confirm");
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('password-confirm').value;

    if (password !== "" && password === confirmPassword) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        input.style.borderColor = "";
    }
}

// Funzione per nascondere l'errore del numero di partita IVA
function hide_vat_number_error() {
    let errorElement = document.getElementById("vat_number_error");
    let vatElement = document.getElementById('vat_number');
    let vatNumberStr = vatElement.value;

    if (vatNumberStr.length === 11 && isNumber(parseInt(vatNumberStr)) && (parseInt(vatNumberStr) > 0)) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        vatElement.style.borderColor = "";
    }
}

// Funzione per nascondere l'errore del nome del ristorante
function hide_name_restaurant_error() {
    let errorElement = document.getElementById("name_restaurant_error");
    let input = document.getElementById("name_restaurant");

    if (input.value.length >= 3) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
        input.style.borderColor = "";
    }
}

// Funzione per nascondere l'errore dei tipi selezionati
function hide_types_error() {
    let selectedCheckboxes = document.querySelectorAll('input[name="types[]"]:checked');
    let errorElement = document.getElementById("types_error");

    if (selectedCheckboxes.length > 0) {
        errorElement.classList.remove("small_visible");
        errorElement.classList.add("small_invisible");
    }
}/*  */