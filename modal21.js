var modal21 = document.getElementById('modal21-editbreakfast-id');

var crosseditbreakfast = document.getElementById("cross-id");

function openedit(e) {
    var modal21 = document.getElementById('modal21-editbreakfast-id');

    modal21.style.display = 'block';

    var x = document.getElementById('update-breakfast-id');
    x.value = e;
}

crosseditbreakfast.onclick = function () {
    modal21.style.display = "none";
}