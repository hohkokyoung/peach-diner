var modal20 = document.getElementById('modal20-password-id');

var delacc = document.getElementsByClassName("close20")[0];
var delacccancel = document.getElementById("cancel20-button");

delacc.onclick = function () {
    modal20.style.display = "none";
}

delacccancel.onclick = function () {
    modal20.style.display = "none";
}

function openmodal2(f) {
    var modal20 = document.getElementById('modal20-password-id');

    modal20.style.display = 'block';

    var y = document.getElementById('password-value-id');
    y.value = f;
}