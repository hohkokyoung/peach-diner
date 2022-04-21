function clearusername() {
    document.getElementById('username').placeholder = '';
}

function setusername() {
    if (document.getElementById('username').placeholder === '') {
        document.getElementById('username').placeholder = 'Username'
    }
}

function clearpassword() {
    document.getElementById('password').placeholder = '';
}

function setpassword() {
    if (document.getElementById('password').placeholder === '') {
        document.getElementById('password').placeholder = 'Password'
    }
}

function clearfirstname() {
    document.getElementById('firstname').placeholder = '';
}

function setfirstname() {
    if (document.getElementById('firstname').placeholder === '') {
        document.getElementById('firstname').placeholder = 'Kok Young'
    }
}

function clearlastname() {
    document.getElementById('lastname').placeholder = '';
}

function setlastname() {
    if (document.getElementById('lastname').placeholder === '') {
        document.getElementById('lastname').placeholder = 'Hoh'
    }
}

function clearemail() {
    document.getElementById('email').placeholder = '';
}

function setemail() {
    if (document.getElementById('email').placeholder === '') {
        document.getElementById('email').placeholder = 'kelvinhoh1520@hotmail.com'
    }
}

function clearcontact() {
    document.getElementById('contact').placeholder = '';
}

function setcontact() {
    if (document.getElementById('contact').placeholder === '') {
        document.getElementById('contact').placeholder = '0123429617'
    }
}

function clearpeach() {
    document.getElementById('peach').placeholder = '';
}

function setpeach() {
    if (document.getElementById('peach').placeholder === '') {
        document.getElementById('peach').placeholder = 'Peach'
    }
}

function clearsearch() {
    document.getElementById('searchid').placeholder = '';
}

function setsearch() {
    if (document.getElementById('searchid').placeholder === '') {
        document.getElementById('searchid').placeholder = 'Search'
    }
}

function clearcustomerssearch() {
    document.getElementById('customerssearchid').placeholder = '';
}

function setcustomerssearch() {
    if (document.getElementById('customerssearchid').placeholder === '') {
        document.getElementById('customerssearchid').placeholder = 'Search'
    }
}

function clearreservationssearch() {
    document.getElementById('reservationssearchid').placeholder = '';
}

function setreservationssearch() {
    if (document.getElementById('reservationssearchid').placeholder === '') {
        document.getElementById('reservationssearchid').placeholder = 'Search'
    }
}

function clearbreakfastdish() {
    document.getElementById('breakfast-dish').placeholder = '';
}

function setbreakfastdish() {
    if (document.getElementById('breakfast-dish').placeholder === '') {
        document.getElementById('breakfast-dish').placeholder = 'Breakfast Sandwich';
    }
}

function clearprice() {
    document.getElementById('price-id').placeholder = '';
}

function setprice() {
    if (document.getElementById('price-id').placeholder === '') {
        document.getElementById('price-id').placeholder = 'RM 10.00';
    }
}

function clearbreakfastdishdescription() {
    document.getElementById('breakfast-description').placeholder = '';
}

function setbreakfastdishdescription() {
    if (document.getElementById('breakfast-description').placeholder === '') {
        document.getElementById('breakfast-description').placeholder = 'Ham, egg and cheese on texas toast.';
    }
}


function settable() {
    var x = document.getElementById('table').value;
    if (x == '2') {
        document.getElementById('total').innerHTML = "RM30";
    }
    else if (x == '4') {
        document.getElementById('total').innerHTML = "RM40";
    }
    else if (x == '8') {
        document.getElementById('total').innerHTML = "RM50";
    }
    else {
        document.getElementById('total').innerHTML = "RM0";
    }
}
