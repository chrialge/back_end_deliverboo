let check_pw = function check_pw() {
    if (document.getElementById('password').value == document.getElementById('password-confirm').value) {
        //console.log('true');
        let element = document.getElementById("password_error");
        element.classList.remove("small_visible");
        element.classList.add("small_invisible");

        let input = document.getElementById("password-confirm");
        input.style.borderColor = "";

    } else {
        //console.log('false');
        let element = document.getElementById("password_error");
        element.classList.remove("small_invisible");
        element.classList.add("small_visible");

        let input = document.getElementById("password-confirm");
        input.style.borderColor = "red";
    }
};
