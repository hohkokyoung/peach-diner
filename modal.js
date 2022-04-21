var modal = document.getElementById('modal-password-id');

// Get the button that opens the modal
var deletebtn = document.getElementById("modal-delete-button");

// Get the <span > element that closes the modal
var canceldelete = document.getElementsByClassName("close")[0];
var canceldeletebtn = document.getElementById("cancel-button");

// When the user clicks the button, open the modal
deletebtn.onclick = function() {
    modal.style.display = "block";
    password_id.select();
}

// When the user clicks on <span > (x), close the modal
canceldelete.onclick = function() {
    modal.style.display = "none";
    password_id.value = "";
}

canceldeletebtn.onclick = function() {
    modal.style.display = "none";
    password_id.value = "";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal || event.target == modal2 || event.target == modal7 || event.target == modal8)

{   
    modal.style.display = "none";
    modal2.style.display = "none";
    modal7.style.display = "none";
    modal8.style.display = "none";
        password_id.value = "";
        oldpassinput.value = '';
        newpassinput.value = '';
        changepassinput.value = '';
        cont2input.value = '';
        cont1input.value = '';
        dobinput.value = '';
        lnameinput.value = '';
        fnameinput.value = '';
        changepassword.style.display = "none";
        changepasstitle.style.display = "inline-block";
        changepassicon.style.display = "initial";
        cont2input.style.display = "none";
        cont2data.style.display = "initial";
        contnum2tick.style.display = "none";
        contnum2cross.style.display = "none";
        changecont2icon.style.display = "initial";
        cont1input.style.display = "none";
        cont1data.style.display = "initial";
        contnum1tick.style.display = "none";
        contnum1cross.style.display = "none";
        changecont1icon.style.display = "initial";
        dobinput.style.display = "none";
        dobdata.style.display = "initial";
        dobtick.style.display = "none";
        dobcross.style.display = "none";
        changedobicon.style.display = "initial";
        lnameinput.style.display = "none";
        lnamedata.style.display = "initial";
        lnametick.style.display = "none";
        lnamecross.style.display = "none";
        changelnameicon.style.display = "initial";
        fnameinput.style.display = "none";
        fnamedata.style.display = "initial";
        fnametick.style.display = "none";
        fnamecross.style.display = "none";
        changefnameicon.style.display = "initial";
        fnamesubmit.style.display = "none";
        lnamesubmit.style.display = "none";
        dobsubmit.style.display = "none";
        cont1submit.style.display = "none";
        cont2submit.style.display = "none";
        passsubmit.style.display = "none";
}
}
