var styles = document.querySelectorAll('link');
var stylesList = document.querySelector('.js-styles-list');

/**
 * 5. U¿ywaj¹c DOM wygeneruj listê dostêpnych stylów alternatywnych na ka¿dej stronie swojego portalu z
 * poprzednich æwiczeñ. Lista mo¿e byæ zbudowana np. z elementów li, albo a albo list rozwijanych formularza.
 */
for (var i = 0; i < styles.length; i++) {
    var style = styles[i];
    var element = document.createElement('li');

    element.innerHTML = style.getAttribute('title');
    /**
     * 6. Korzystaj¹c z onClick na elementach listy i DOM
     * zaprogramuj stronê tak aby przegl¹darka prze³¹cza³a aktywny styl.
     */
    element.setAttribute('onclick', 'setStyleActive(' + i + ')');
    stylesList.appendChild(element);
}

function setStyleActive(index) {
    console.log('set active: ', index, styles);

    // Najpierw trzeba wy³¹czyæ wszystkie, bo inaczej przy
    // odœwie¿eniu strony i próbie ustawienia stylu z cookies coœ siê
    // buguje i nie dzia³a i smuteczek ogólnie
    for (var i = 0; i < styles.length; i++) {
        styles[i].disabled = true;
    }

    styles[index].disabled = false;

    /**
     * Ustaw cookie
     */
    document.cookie = 'style=' + index + ';';
}

/**
 * 7. Za pomoc¹ Cookies zaprogramuj aby wybrany styl by³ domyœlny
 * przy ponownym odwiedzaniu strony, albo przejœciu do innej strony Twojego portalu.
 */
window.addEventListener('load', function () {
    if (document.cookie) {
        var cookies = document.cookie.split(/; */);

        for (var i = 0; i < cookies.length; i++) {
            var data = cookies[i].split('=');

            if (data[0] == 'style') {
                setStyleActive(parseInt(data[1]));
            }
        }
    }
});