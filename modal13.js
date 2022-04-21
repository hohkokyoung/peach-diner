var modal13 = document.getElementById('modal13-reservations-id');

var reservationsbtn = document.getElementById("modal13-reservations-button");

var reservationssearchtext = document.getElementById("reservationssearchid");

var cancelreservations = document.getElementsByClassName("close13")[0];
var cancelreservationsbtn = document.getElementById("cancel13-button");

reservationsbtn.onclick = function () {
    modal13.style.display = "block";
    modal9.style.display = "none";
}

cancelreservations.onclick = function () {
    modal13.style.display = "none";
    reservationssearchtext.value = '';
}

cancelreservationsbtn.onclick = function () {
    modal13.style.display = "none";
    reservationssearchtext.value = '';
}
