var modal12 = document.getElementById('modal12-cancelbooking-id');

var cancelbooking = document.getElementsByClassName("close12")[0];
var cancelbookingno = document.getElementById("cancel12-button");

function openmodal(e) {
    var modal12 = document.getElementById('modal12-cancelbooking-id');

    modal12.style.display = 'block';

    var x = document.getElementById('reserve-value-id');
    x.value = e;
}

cancelbooking.onclick = function () {
    modal12.style.display = "none";
}

cancelbookingno.onclick = function () {
    modal12.style.display = "none";
}
