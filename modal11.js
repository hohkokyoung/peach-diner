var modal11 = document.getElementById('modal11-records-id');

var recordsbtn = document.getElementById("modal11-records-button");

var searchtext = document.getElementById("searchid");

var cancelrecords = document.getElementsByClassName("close11")[0];
var cancelrecordsbtn = document.getElementById("cancel11-button");

var settingsbtn = document.getElementById("modal2-settings-button");

recordsbtn.onclick = function () {
    modal11.style.display = "block";
}

cancelrecords.onclick = function () {
    modal11.style.display = "none";
    searchtext.value = '';
}

cancelrecordsbtn.onclick = function () {
    modal11.style.display = "none";
    searchtext.value = '';
}

window.onclick = function (event) {

    if (event.target == modal11 || event.target == modal2 || event.target == modal9 || event.target == modal13 || event.target == modal14 || event.target == modal8 || event.target == modal18) {

        modal2.style.display = "none";
        modal11.style.display = "none";
        modal13.style.display = "none";
        modal14.style.display = "none";
        modal18.style.display = "none";
        modal9.style.display = "none";
        modal8.style.display = "none";
        changepassword.style.display = "none";
        changepasstitle.style.display = "inline-block";
        changepassicon.style.display = "initial";
        passsubmit.style.display = "none";
        oldpassinput.value = '';
        newpassinput.value = '';
        changepassinput.value = '';
        searchtext.value = '';
        customerssearchtext.value = '';
        reservationssearchtext.value = '';
    }
}