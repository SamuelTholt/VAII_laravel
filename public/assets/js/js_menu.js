document.addEventListener('DOMContentLoaded', function () {
    var request = new XMLHttpRequest();
    request.open('GET', '/menu/data', true);

    request.onload = function () {
        if (request.status >= 200 && request.status < 400) {
            var data = JSON.parse(request.responseText);
            var menu = '';

            data.forEach(function (value) {
                var item = value.jedlo_id + ". " + value.nazov + ' <span style="float: right;">&bull; ' + value.cena + ' €</span><br>';
                item += '<small>' + value.popis + '</small><br>';
                item += '<small> Alergény: ' + value.alergeny + '</small><br>';
                if (value.kategoria_id === 1) {
                    document.getElementById('polievky').innerHTML += item;
                } else if (value.kategoria_id === 2) {
                    document.getElementById('hlavneJedla').innerHTML += item;
                } else if (value.kategoria_id === 3) {
                document.getElementById('prilohy').innerHTML += item;
            }

            });

        } else {
            console.error('Server error');
        }
    };

    request.onerror = function () {
        console.error('Connection error');
    };

    request.send();
});

