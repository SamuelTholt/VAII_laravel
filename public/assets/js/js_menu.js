function addMenuItem() {
    var nazov = document.getElementById('nazov').value;
    var cena = document.getElementById('cena').value;
    var popis = document.getElementById('popis').value;
    var alergeny = document.getElementById('alergeny').value;
    var kategoria_id = document.getElementById('kategoria_id').value;

    var data = {
        nazov: nazov,
        cena: cena,
        popis: popis,
        alergeny: alergeny,
        kategoria_id: kategoria_id
    };

    fetch('/menu/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(data.message);
                alert(nazov + " - Jedlo bolo pridané!");

            } else {
                console.error(data.message);
                alert("Jedlo nebolo pridané, pravdepodobne ste zadali zlé parametre!");
            }
        })
        .catch(error => {
            console.error('Chyba pri vykonávaní AJAX volania: ', error);
            alert("Jedlo nebolo pridané, pravdepodobne ste zadali zlé parametre!");
        });

    refreshMenu();
}

function refreshMenu() {
    fetch('/menu/data')
        .then(response => response.json())
        .then(data => {
            var menu = '';

            data.forEach(function (value) {
                var item = value.nazov + ' <span style="float: right;">&bull; ' + value.cena + ' €</span><br>';
                item += '<small>' + value.popis + '</small><br>';
                item += '<small> Alergény: ' + value.alergeny + '</small><br>';
                if (isAdmin) {
                    item += '<button onclick="editItem(\'' + value.jedlo_id + '\')">Editovať</button><br>';
                    item += '<button onclick="deleteItem(' + value.jedlo_id + ')">Odstrániť</button><br>';
                }
                if (value.kategoria_id === 1) {
                    document.getElementById('polievky').innerHTML += item;
                } else if (value.kategoria_id === 2) {
                    document.getElementById('hlavneJedla').innerHTML += item;
                } else if (value.kategoria_id === 3) {
                    document.getElementById('prilohy').innerHTML += item;
                }
            });
        })
        .catch(error => {
            console.error('Chyba pri načítavaní menu: ', error);
        });
}

document.addEventListener('DOMContentLoaded', function () {
    refreshMenu();
});

function toggleForm() {
    var form = document.getElementById('addItemForm');
    form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
}

function editItem(jedlo_id) {
    var editUrl = '/menu/' + jedlo_id + '/edit';

    window.location.href = editUrl;
}

function deleteItem(jedlo_id) {
    var url = '/menu/' + jedlo_id;

    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(data.message);
                alert("Jedlo bolo úspešne odstránené!");
                location.reload();
            } else {
                console.error(data.message);
                alert("Jedlo nebolo odstránené, pravdepodobne sa vyskytla chyba!");
            }
        })
        .catch(error => {
            console.error('Chyba pri vykonávaní AJAX volania: ', error);
            alert("Jedlo nebolo odstránené, pravdepodobne sa vyskytla chyba!");
        });

}



