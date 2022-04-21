var edit = document.getElementById('edit-id');
var tick = document.getElementById('tick-id');
var cross = document.getElementById('cross-id');
var trash = document.getElementById('trash-id');
var breakfastdishinput = document.getElementById('breakfast-dish-input-id');
var breakfastpriceinput = document.getElementById('breakfast-price-input-id');
var breakfastdescriptioninput = document.getElementById('breakfast-description-input-id');
var breakfastdishimageinput = document.getElementById('breakfast-dish-image-input-id');
var breakfastdishdisplay = document.getElementById('breakfast-dish-display-id');
var breakfastpricedisplay = document.getElementById('breakfast-price-display-id');
var breakfastdescriptiondisplay = document.getElementById('breakfast-description-display-id');
var breakfastdishimagedisplay = document.getElementById('breakfast-dish-image-display-id');
var breakfasttable = document.getElementById('breakfast-table-id');

var plus = document.getElementById('plus-id');
var breakfastdishinputplus = document.getElementById('breakfast-dish-input-id-plus');
var breakfastpriceinputplus = document.getElementById('breakfast-price-input-id-plus');
var breakfastdescriptioninputplus = document.getElementById('breakfast-description-input-id-plus');
var breakfastdishimageinputplus = document.getElementById('breakfast-dish-image-input-id-plus');
var breakfasttableplus = document.getElementById('breakfast-table-id-plus');
var tickplus = document.getElementById('tick-id-plus');
var crossplus = document.getElementById('cross-id-plus');

function openedit(e) {
    tick.style.display = "initial";
    cross.style.display = "initial";
    trash.style.display = "none";
    breakfastdishinput.style.display = "block";
    breakfastdishinput.style.marginLeft = "6.2em";
    breakfastdishinput.style.marginTop = "-4em";
    breakfastpriceinput.style.display = "block";
    breakfastpriceinput.style.marginLeft = "6.2em";
    breakfastdescriptioninput.style.display = "inline-block";
    breakfastdescriptioninput.style.marginLeft = "6.2em";
    breakfastdescriptioninput.style.marginTop = "-.3em";
    breakfastdishimageinput.style.display = "initial";
    breakfastdishdisplay.style.display = "none";
    breakfastpricedisplay.style.display = "none";
    breakfastdescriptiondisplay.style.display = "none";
    breakfastdishimagedisplay.style.display = "none";
    breakfasttable.style.paddingTop = "3em";
}

cross.onclick = function () {
    window.location.href = "breakfastnew.php";
}

plus.onclick = function () {
    breakfastdishinputplus.style.display = "block";
    breakfastdishinputplus.style.marginLeft = "6.2em";
    breakfastdishinputplus.style.marginTop = "-4em";
    breakfastpriceinputplus.style.display = "block";
    breakfastpriceinputplus.style.marginLeft = "6.2em";
    breakfastdescriptioninputplus.style.display = "inline-block";
    breakfastdescriptioninputplus.style.marginLeft = "6.2em";
    breakfastdescriptioninputplus.style.marginTop = "-.3em";
    breakfastdishimageinputplus.style.display = "initial";
    breakfasttableplus.style.paddingTop = "3em";
    tickplus.style.display = "initial";
    crossplus.style.display = "initial";
    plus.style.display = "none";
}

crossplus.onclick = function () {
    breakfastdishinputplus.style.display = "none";
    breakfastpriceinputplus.style.display = "none";
    breakfastdescriptioninputplus.style.display = "none";
    breakfastdishimageinputplus.style.display = "none";
    breakfasttableplus.style.paddingTop = "0em";
    breakfasttableplus.style.marginBottom = "2.5em";
    tickplus.style.display = "none";
    crossplus.style.display = "none";
    plus.style.display = "block";
}