var ilosc_pol_zalacznikow = 1;
const MAX_ZALACZNIKOW = 10;

function onload() {
    actualizeDate();
    actualizeHour();
}

function actualizeDate() {
    var field = document.getElementById('date');    
    var actualDate = new Date();
    var day = actualDate.getDate();
    if (day < 10) {
        day = '0' + day;
    }
    var month = actualDate.getMonth() + 1;
    if (month < 10) {
        month = '0' + month;
    }
    var year = actualDate.getFullYear();
    var finalDate = year + '-' + month + '-' + day;
    field.value = finalDate;
}

function validateDate() {
    var field = document.getElementById('date').value;
    var dateSplit = field.split('-');
    var now = new Date();
    var parsed = new Date(dateSplit[0], parseInt(dateSplit[1]) - 1, parseInt(dateSplit[2]));
    var dateValidationRegex = /^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/gi;
    if (!dateValidationRegex.test(field) || parsed>now) {
        actualizeDate();
    }
}

function actualizeHour() {
    var field = document.getElementById('time');
    var actualDate = new Date();
    var hour = actualDate.getHours();
    var minutes = actualDate.getMinutes();
    if (minutes < 10) {
        minutes = '0' + minutes;
    }
    field.value = hour + ":" + minutes;
}

function validateHour() {
    var field = document.getElementById('time').value;
    var regexp_godziny = /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/gi;
    if (!regexp_godziny.test(field)) {
        actualizeHour();
    }
}

function stworzNowyPrzyciskZalacznika() {
    if (ilosc_pol_zalacznikow < MAX_ZALACZNIKOW) {
        ilosc_pol_zalacznikow++;

        var nowyPrzycisk = document.createElement('input');
        nowyPrzycisk.setAttribute("type", "file");
        nowyPrzycisk.setAttribute("name", "zalacznik" + ilosc_pol_zalacznikow);
        nowyPrzycisk.setAttribute("onclick", "stworzNowyPrzyciskZalacznika()");

        var nowa_linia = document.createElement('br');

        var pole_zalacznikow = document.getElementById("dodawanie_zalacznikow");
        pole_zalacznikow.appendChild(nowyPrzycisk);
        pole_zalacznikow.appendChild(nowa_linia);
    }
}

function stworzStyle() {
    var style = document.getElementsByTagName("link");
    var iloscStyli = style.length;
    console.log(iloscStyli);

    var spisTresci = document.getElementById("miejsce_na_style");

    for (i = 0; i < iloscStyli; i++) {
        var aktualnyElement = document.createElement('a');
        var nazwaStylu = style[i].title;

        aktualnyElement.innerHTML = nazwaStylu;
        aktualnyElement.setAttribute("onclick", "wybierzStyl(\"" + nazwaStylu + "\")");

        console.log("AA");
        spisTresci.appendChild(aktualnyElement);
        spisTresci.appendChild(document.createElement('br'));
    }


}

function wybierzStyl(nazwaStylu) {
    var listaStyli = document.getElementsByTagName("link");
    var iloscStyli = listaStyli.length;
    for (var i = 0; i < iloscStyli; i++) {
        var styl = listaStyli[i];
        if (styl.getAttribute("title") == nazwaStylu) {
            styl.disabled = false;
            console.log(styl.getAttribute("title") + " enabled");
        } else {
            styl.disabled = true;
            console.log(styl.getAttribute("title") + " disabled");
        }
    }

    ustawCiasteczko("style", nazwaStylu, 365);
}

function sprawdzCiasteczko() {
    var ciasteczko = wczytajCiasteczko("style");
    wybierzStyl(ciasteczko);
}

function ustawCiasteczko(nazwa, styl, dni) {
    var data = new Date();
    data.setTime(data.getTime() + (dni * 24 * 60 * 60 * 1000));
    var wygasa = "expires=" + data.toUTCString();
    document.cookie = nazwa + "=" + styl + ";" + wygasa + "; path=/";
}

function wczytajCiasteczko(nazwa) {
    var styl = "";
    var nazwa = nazwa + "=";
    var ciasteczko = decodeURIComponent(document.cookie);
    var ciasteczko_tablica = ciasteczko.split(';');
    for (var i = 0; i < ciasteczko_tablica.length; i++) {
        var fragment = ciasteczko_tablica[i];
        while (fragment.charAt(0) == ' ') {
            fragment = fragment.substring(1);
        }
        if (fragment.indexOf(nazwa) == 0) {
            styl = fragment.substring(nazwa.length, fragment.length);
            break;
        }
    }
    return styl;
}