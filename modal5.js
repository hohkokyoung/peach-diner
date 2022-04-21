var modal5 = document.getElementById('modal5-payment-id');

var cancel5pay = document.getElementsByClassName("close5")[0];
var cancel5btn = document.getElementById("cancel5-button");

var creditcard = document.getElementById('credit-card-id');
var onlinebanking = document.getElementById('online-banking-id');
var paypal = document.getElementById('paypal-id');

var password = document.getElementById('password-id');
var pay = document.getElementById('pay-id');
var onlinebankingtable = document.getElementById('online-banking-table-id');

var maybank = document.getElementById('maybank-id');
var cimb = document.getElementById('cimb-id');
var publicbank = document.getElementById('publicbank-id');
var rhb = document.getElementById('rhb-id');
var hongleongbank = document.getElementById('hongleongbank-id');


creditcard.onclick = function () {
    creditcard.style.backgroundColor = "lightgrey";
    onlinebanking.style.backgroundColor = "white";
    paypal.style.backgroundColor = "white";
    password.style.display = "initial";
    pay.style.display = "initial";
    onlinebankingtable.style.display = "none";
    maybank.style.backgroundColor = "white";
    cimb.style.backgroundColor = "white";
    publicbank.style.backgroundColor = "white";
    rhb.style.backgroundColor = "white";
    hongleongbank.style.backgroundColor = "white";
}

onlinebanking.onclick = function () {
    onlinebanking.style.backgroundColor = "lightgrey";
    creditcard.style.backgroundColor = "white";
    paypal.style.backgroundColor = "white";
    password.style.display = "none";
    pay.style.display = "initial";
    onlinebankingtable.style.display = "initial";
    pay.style.display = "none";
}

paypal.onclick = function () {
    paypal.style.backgroundColor = "lightgrey";
    creditcard.style.backgroundColor = "white";
    onlinebanking.style.backgroundColor = "white";
    password.style.display = "initial";
    pay.style.display = "initial";
    onlinebankingtable.style.display = "none";
    maybank.style.backgroundColor = "white";
    cimb.style.backgroundColor = "white";
    publicbank.style.backgroundColor = "white";
    rhb.style.backgroundColor = "white";
    hongleongbank.style.backgroundColor = "white";
}

maybank.onclick = function () {
    maybank.style.backgroundColor = "lightgrey";
    cimb.style.backgroundColor = "white";
    publicbank.style.backgroundColor = "white";
    rhb.style.backgroundColor = "white";
    hongleongbank.style.backgroundColor = "white";
    password.style.display = "initial";
    pay.style.display = "initial";
}

cimb.onclick = function () {
    cimb.style.backgroundColor = "lightgrey";
    maybank.style.backgroundColor = "white";
    publicbank.style.backgroundColor = "white";
    rhb.style.backgroundColor = "white";
    hongleongbank.style.backgroundColor = "white";
    password.style.display = "initial";
    pay.style.display = "initial";
}

publicbank.onclick = function () {
    publicbank.style.backgroundColor = "lightgrey";
    rhb.style.backgroundColor = "white";
    hongleongbank.style.backgroundColor = "white";
    maybank.style.backgroundColor = "white";
    cimb.style.backgroundColor = "white";
    password.style.display = "initial";
    pay.style.display = "initial";
}

rhb.onclick = function () {
    rhb.style.backgroundColor = "lightgrey";
    maybank.style.backgroundColor = "white";
    publicbank.style.backgroundColor = "white";
    hongleongbank.style.backgroundColor = "white";
    maybank.style.backgroundColor = "white";
    pay.style.display = "initial";
}

hongleongbank.onclick = function () {
    hongleongbank.style.backgroundColor = "lightgrey";
    maybank.style.backgroundColor = "white";
    cimb.style.backgroundColor = "white";
    publicbank.style.backgroundColor = "white";
    rhb.style.backgroundColor = "white";
    password.style.display = "initial";
    pay.style.display = "initial";
}


cancel5pay.onclick = function () {
    modal5.style.display = "none";
    creditcard.style.backgroundColor = "white";
    onlinebanking.style.backgroundColor = "white";
    paypal.style.backgroundColor = "white";
    password.style.display = "none";
    pay.style.display = "none";
    onlinebankingtable.style.display = "none";
    maybank.style.backgroundColor = "white";
    cimb.style.backgroundColor = "white";
    publicbank.style.backgroundColor = "white";
    rhb.style.backgroundColor = "white";
    hongleongbank.style.backgroundColor = "white";
}

cancel5btn.onclick = function () {
    modal5.style.display = "none";
    creditcard.style.backgroundColor = "white";
    onlinebanking.style.backgroundColor = "white";
    paypal.style.backgroundColor = "white";
    password.style.display = "none";
    pay.style.display = "none";
    onlinebankingtable.style.display = "none";
    maybank.style.backgroundColor = "white";
    cimb.style.backgroundColor = "white";
    publicbank.style.backgroundColor = "white";
    rhb.style.backgroundColor = "white";
    hongleongbank.style.backgroundColor = "white";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal5 || event.target == modal6) {
        modal5.style.display = "none";
        modal6.style.display = "none";
        creditcard.style.backgroundColor = "white";
        onlinebanking.style.backgroundColor = "white";
        paypal.style.backgroundColor = "white";
        password.style.display = "none";
        pay.style.display = "none";
        onlinebankingtable.style.display = "none";
        maybank.style.backgroundColor = "white";
        cimb.style.backgroundColor = "white";
        publicbank.style.backgroundColor = "white";
        rhb.style.backgroundColor = "white";
        hongleongbank.style.backgroundColor = "white";
    }
}