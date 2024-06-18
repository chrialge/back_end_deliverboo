const visibilityElFirst = document.getElementById("visibility-0");
const visibilityElSecond = document.getElementById("visibility-1");

visibilityElFirst.addEventListener('click', function () {
    if (visibilityElFirst.checked) {
        visibilityElSecond.checked = false;
    }
})
visibilityElSecond.addEventListener('click', function () {
    if (visibilityElSecond.checked) {
        visibilityElFirst.checked = false;
    }
})