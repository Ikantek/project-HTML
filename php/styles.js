var styles = document.querySelectorAll('link');
var stylesList = document.querySelector('.js-styles-list');

/**
 * 5. U�ywaj�c DOM wygeneruj list� dost�pnych styl�w alternatywnych na ka�dej stronie swojego portalu z
 * poprzednich �wicze�. Lista mo�e by� zbudowana np. z element�w li, albo a albo list rozwijanych formularza.
 */
for (var i = 0; i < styles.length; i++) {
    var style = styles[i];
    var element = document.createElement('li');

    element.innerHTML = style.getAttribute('title');
    /**
     * 6. Korzystaj�c z onClick na elementach listy i DOM
     * zaprogramuj stron� tak aby przegl�darka prze��cza�a aktywny styl.
     */
    element.setAttribute('onclick', 'setStyleActive(' + i + ')');
    stylesList.appendChild(element);
}

function setStyleActive(index) {
    console.log('set active: ', index, styles);

    // Najpierw trzeba wy��czy� wszystkie, bo inaczej przy
    // od�wie�eniu strony i pr�bie ustawienia stylu z cookies co� si�
    // buguje i nie dzia�a i smuteczek og�lnie
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
 * 7. Za pomoc� Cookies zaprogramuj aby wybrany styl by� domy�lny
 * przy ponownym odwiedzaniu strony, albo przej�ciu do innej strony Twojego portalu.
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