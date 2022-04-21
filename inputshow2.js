var oldpassinput = document.getElementById('old-password-input');
var newpassinput = document.getElementById('new-password-input');
var changepassinput = document.getElementById('confirm-password-input');
var changepasstitle = document.getElementById('chg_pass_title');
var changepassicon = document.getElementById('password-change-icon');
var changepassword = document.getElementById('change-password');
var passsubmit = document.getElementById('pass-submit');
var modal2 = document.getElementById('modal2-settings-id');

var settingsbtn = document.getElementById("modal2-settings-button");

var passwordtick = document.getElementById('pass-tick-icon-id');

var passwordcross = document.getElementById('pass-cross-icon-id');

var cancelsettings = document.getElementsByClassName("close2")[0];
var cancelsettingsbtn = document.getElementById("cancel2-button");

settingsbtn.onclick = function () {
    modal2.style.display = "block";
}

cancelsettings.onclick = function () {
    modal2.style.display = "none";
    changepassword.style.display = "none";
    changepasstitle.style.display = "inline-block";
    changepassicon.style.display = "initial";
    oldpassinput.value = '';
    newpassinput.value = '';
    changepassinput.value = '';
    changepassword.style.display = "none";
    passwordtick.style.display = "none";
    passwordcross.style.display = "none";
    passsubmit.style.display = "none";
}

cancelsettingsbtn.onclick = function () {
    modal2.style.display = "none";
    changepassword.style.display = "none";
    changepasstitle.style.display = "inline-block";
    changepassicon.style.display = "initial";
    oldpassinput.value = '';
    newpassinput.value = '';
    changepassinput.value = '';
    changepassword.style.display = "none";
    passwordtick.style.display = "none";
    passwordcross.style.display = "none";
    passsubmit.style.display = "none";
}

changepassicon.onclick = function () {
    changepasstitle.style.display = "none";
    changepassicon.style.display = "none";
    changepassword.style.display = "initial";
    passwordtick.style.display = "initial";
    passwordcross.style.display = "initial";
    passsubmit.style.display = "initial";
}


passwordcross.onclick = function () {
    changepassword.style.display = "none";
    changepasstitle.style.display = "inline-block";
    changepassicon.style.display = "initial";
    oldpassinput.value = '';
    newpassinput.value = '';
    changepassinput.value = '';
    changepassword.style.display = "none";
    passwordtick.style.display = "none";
    passwordcross.style.display = "none";
    passsubmit.style.display = "none";
}
