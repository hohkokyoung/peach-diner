var modal3 = document.getElementById('modal3-forgot-id');
// Get the button that opens the modal
var forgotbtn = document.getElementById("modal3-forgot-button");

// Get the <span > element that closes the modal
var cancelforgot = document.getElementsByClassName("close3")[0];
var cancelforgotbtn = document.getElementById("cancel3-button");

// When the user clicks the button, open the modal
forgotbtn.onclick = function () {
    modal3.style.display = "block";
    forgot_username_id.select();
}

// When the user clicks on <span > (x), close the modal
cancelforgot.onclick = function () {
    modal3.style.display = "none";
    forgot_username_id.value = '';
    forgot_email_id.value = '';
}

cancelforgotbtn.onclick = function () {
    modal3.style.display = "none";
    forgot_username_id.value = '';
    forgot_email_id.value = '';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal3 || event.target == modal4) {
        modal3.style.display = "none";
        modal4.style.display = "none";
        forgot_username_id.value = '';
        forgot_email_id.value = '';
    }
}

