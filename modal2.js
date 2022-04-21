var modal2 = document.getElementById('modal2-settings-id');
// Get the button that opens the modal
var settingsbtn = document.getElementById("modal2-settings-button");

// Get the <span > element that closes the modal
var cancelsettings = document.getElementsByClassName("close2")[0];
var cancelsettingsbtn = document.getElementById("cancel2-button");

// When the user clicks the button, open the modal
settingsbtn.onclick = function () {
    modal2.style.display = "block";
}

// When the user clicks on <span > (x), close the modal
cancelsettings.onclick = function () {
    modal2.style.display = "none";
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

cancelsettingsbtn.onclick = function () {
    modal2.style.display = "none";
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
