var modal4 = document.getElementById('modal4-randnum-id');
// Get the <span > element that closes the modal
var cancelrandnum = document.getElementsByClassName("close4")[0];
var cancelrandnumbtn = document.getElementById("cancel4-button");
var randnum = document.getElementById("randnum-id");

// When the user clicks on <span > (x), close the modal
cancelrandnum.onclick = function () {
    modal4.style.display = "none";
    randnum.value = '';
}

cancelrandnumbtn.onclick = function () {
    modal4.style.display = "none";
    randnum.value = '';
}
