var modal7 = document.getElementById('modal7-history-id');

var historybtn = document.getElementById("modal7-history-button");

var cancelhistory = document.getElementsByClassName("close7")[0];
var cancelhistorybtn = document.getElementById("cancel7-button");

historybtn.onclick = function () {
    modal7.style.display = "block";
}

cancelhistory.onclick = function () {
    modal7.style.display = "none";
}

cancelhistorybtn.onclick = function () {
    modal7.style.display = "none";
}