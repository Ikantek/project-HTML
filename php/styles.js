var styleLinks = document.querySelectorAll('link');
var stylesDiv = document.querySelector('.styles');

for (var i = 0; i < styleLinks.length; i++) {
    var style = styleLinks[i];
    var element = document.createElement('li');

    element.innerHTML = style.getAttribute('title');
    element.setAttribute('onclick', 'setStyleActive(' + i + ')');
    stylesDiv.appendChild(element);
}

function setStyleActive(index) {
    for (var i = 0; i < styleLinks.length; i++) {
        styleLinks[i].disabled = true;
    }

    styleLinks[index].disabled = false;

    document.cookie = 'STP=' + index + ';' + 'expires=Tue, 19 Jan 2038 03:14:07 GMT' + ';';
}

window.addEventListener('load', function () {
    if (document.cookie) {
        var cookies = document.cookie.split(/; */);

        for (var i = 0; i < cookies.length; i++) {
            var data = cookies[i].split('=');

            if (data[0] == 'STP') {
                setStyleActive(parseInt(data[1]));
            }
        }
    }
});