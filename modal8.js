var modal8 = document.getElementById('modal8-edit-menu-id');

var editbtn = document.getElementById("modal8-edit-button");

var canceledit = document.getElementsByClassName("close8")[0];
var canceleditbtn = document.getElementById("cancel8-button");

editbtn.onclick = function () {
    modal8.style.display = "block";
}

canceledit.onclick = function () {
    modal8.style.display = "none";
}

canceleditbtn.onclick = function () {
    modal8.style.display = "none";
}