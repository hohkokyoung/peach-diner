var fnameinput = document.getElementById('firstname');
var fnamedata = document.getElementById('firstnamedata');
var changefnameicon = document.getElementById('fname-change-icon');
var fnamesubmit = document.getElementById('fname-submit');

var lnameinput = document.getElementById('lastname');
var lnamedata = document.getElementById('lastnamedata');
var changelnameicon = document.getElementById('lname-change-icon');
var lnamesubmit = document.getElementById('lname-submit');

var dobinput = document.getElementById('dateob');
var dobdata = document.getElementById('dobdata');
var changedobicon = document.getElementById('dob-change-icon');
var dobsubmit = document.getElementById('dob-submit');

var cont1input = document.getElementById('contact1');
var cont1data = document.getElementById('contnum1data');
var changecont1icon = document.getElementById('contnum1-change-icon');
var cont1submit = document.getElementById('contnum1-submit');

var cont2input = document.getElementById('contact2');
var cont2data = document.getElementById('contnum2data');
var changecont2icon = document.getElementById('contnum2-change-icon');
var cont2submit = document.getElementById('contnum2-submit');

var oldpassinput = document.getElementById('old-password-input');
var newpassinput = document.getElementById('new-password-input');
var changepassinput = document.getElementById('confirm-password-input');
var changepasstitle = document.getElementById('chg_pass_title');
var changepassicon = document.getElementById('password-change-icon');
var changepassword = document.getElementById('change-password');
var passsubmit = document.getElementById('pass-submit');

var fnametick = document.getElementById('fname-tick-icon-id');
var lnametick = document.getElementById('lname-tick-icon-id');
var dobtick = document.getElementById('dob-tick-icon-id');
var contnum1tick = document.getElementById('contnum1-tick-icon-id');
var contnum2tick = document.getElementById('contnum2-tick-icon-id');
var passwordtick = document.getElementById('pass-tick-icon-id');

var fnamecross = document.getElementById('fname-cross-icon-id');
var lnamecross = document.getElementById('lname-cross-icon-id');
var dobcross = document.getElementById('dob-cross-icon-id');
var contnum1cross = document.getElementById('contnum1-cross-icon-id');
var contnum2cross = document.getElementById('contnum2-cross-icon-id');
var passwordcross = document.getElementById('pass-cross-icon-id');

changefnameicon.onclick = function () {
    fnamedata.style.display = "none";
    fnameinput.style.display = "initial";
    changefnameicon.style.display = "none";
    fnametick.style.display = "initial";
    fnamecross.style.display = "initial";
    fnamesubmit.style.display = "initial";
}

changelnameicon.onclick = function () {
    lnamedata.style.display = "none";
    lnameinput.style.display = "initial";
    changelnameicon.style.display = "none";
    lnametick.style.display = "initial";
    lnamecross.style.display = "initial";
    lnamesubmit.style.display = "initial";
}

changedobicon.onclick = function () {
    dobdata.style.display = "none";
    dobinput.style.display = "initial";
    changedobicon.style.display = "none";
    dobtick.style.display = "initial";
    dobcross.style.display = "initial";
    dobsubmit.style.display = "initial";
}

changecont1icon.onclick = function () {
    cont1data.style.display = "none";
    cont1input.style.display = "initial";
    changecont1icon.style.display = "none";
    contnum1tick.style.display = "initial";
    contnum1cross.style.display = "initial";
    cont1submit.style.display = "initial";
}

changecont2icon.onclick = function () {
    cont2data.style.display = "none";
    cont2input.style.display = "initial";
    changecont2icon.style.display = "none";
    contnum2tick.style.display = "initial";
    contnum2cross.style.display = "initial";
    cont2submit.style.display = "initial";
}

changepassicon.onclick = function () {
    changepasstitle.style.display = "none";
    changepassicon.style.display = "none";
    changepassword.style.display = "initial";
    passwordtick.style.display = "initial";
    passwordcross.style.display = "initial";
    passsubmit.style.display = "initial";
}

fnamecross.onclick = function () {
    fnameinput.value = '';
    fnameinput.style.display = "none";
    fnamedata.style.display = "initial";
    fnametick.style.display = "none";
    fnamecross.style.display = "none";
    changefnameicon.style.display = "initial";
    fnamesubmit.style.display = "none";
}

lnamecross.onclick = function () {
    lnameinput.value = '';
    lnameinput.style.display = "none";
    lnamedata.style.display = "initial";
    lnametick.style.display = "none";
    lnamecross.style.display = "none";
    changelnameicon.style.display = "initial";
    lnamesubmit.style.display = "none";
}

dobcross.onclick = function () {
    dobinput.value = '';
    dobinput.style.display = "none";
    dobdata.style.display = "initial";
    dobtick.style.display = "none";
    dobcross.style.display = "none";
    changedobicon.style.display = "initial";
    dobsubmit.style.display = "none";
}

contnum1cross.onclick = function () {
    cont1input.value = '';
    cont1input.style.display = "none";
    cont1data.style.display = "initial";
    contnum1tick.style.display = "none";
    contnum1cross.style.display = "none";
    changecont1icon.style.display = "initial";
    cont1submit.style.display = "none";
}

contnum2cross.onclick = function () {
    cont2input.value = '';
    cont2input.style.display = "none";
    cont2data.style.display = "initial";
    contnum2tick.style.display = "none";
    contnum2cross.style.display = "none";
    changecont2icon.style.display = "initial";
    cont2submit.style.display = "none";
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
