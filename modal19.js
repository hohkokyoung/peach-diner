var modal19 = document.getElementById('modal19-deletebreakfast-id');

var cancelbreakfast = document.getElementsByClassName("close19")[0];
var cancelbreakfastno = document.getElementById("cancel19-button");

function openmodal(e) {
    var modal19 = document.getElementById('modal19-deletebreakfast-id');

    modal19.style.display = 'block';

    var x = document.getElementById('delete-breakfast-id');
    x.value = e;
}

cancelbreakfast.onclick = function () {
    modal19.style.display = "none";
}

cancelbreakfastno.onclick = function () {
    modal19.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal19 || event.target == modal21) {
        modal19.style.display = "none";
        modal21.style.display = "none";
    }
}