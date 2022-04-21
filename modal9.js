var modal9 = document.getElementById('modal9-bookings-id');

var bookingsbtn = document.getElementById("modal9-bookings-button");

var cancelbookings = document.getElementsByClassName("close9")[0];
var cancelbookingsbtn = document.getElementById("cancel9-button");

bookingsbtn.onclick = function () {
    modal9.style.display = "block";
}

cancelbookings.onclick = function () {
    modal9.style.display = "none";
}

cancelbookingsbtn.onclick = function () {
    modal9.style.display = "none";
}