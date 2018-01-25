function setCookie(userid , exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie =userid + "=" +   expires + ";path=/";
}

function getCookie(userid) {

    var name = userid + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(userid) {
    var thecokie = getCookie(userid);
    if (thecokie !==" ") {
        thecokie.split('|')
        return [thecokie[0],thecokie[1]];
    }
    else
    {
        return false;
    }
}