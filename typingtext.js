function typeEffect(element, speed) {
    var text = $(element).text();
    $(element).html('');

    var i = 0;
    var timer = setInterval(function () {
        if (i < text.length) {
            $(element).append(text.charAt(i));
            i++;
        } else {
            clearInterval(timer);
        }
    }, speed);
}

$(document).ready(function () {
    var speed = 70;
    typeEffect($('h2'), speed);
});

$(document).ready(function () {
    var speed = 150;
    typeEffect($('p'), speed);
});

$(document).ready(function () {
    var speed = 70;
    typeEffect($('h3'), speed);
});