var modal14 = document.getElementById('modal14-customers-id');

var customersbtn = document.getElementById("modal14-customers-button");

var customerssearchtext = document.getElementById("customerssearchid");

var cancelcustomers = document.getElementsByClassName("close14")[0];
var cancelcustomersbtn = document.getElementById("cancel14-button");

customersbtn.onclick = function () {
    modal14.style.display = "block";
    modal9.style.display = "none";
}

cancelcustomers.onclick = function () {
    modal14.style.display = "none";
    customerssearchtext.value = '';
}

cancelcustomersbtn.onclick = function () {
    modal14.style.display = "none";
    customerssearchtext.value = '';
}
