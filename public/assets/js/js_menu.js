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
                alert("Jedlo bolo pridané!");

                // Po úspešnom pridaní obnovte zoznam jedál
                refreshMenu();
            } else {
                console.error(data.message);
                alert("Jedlo nebolo pridané, pravdepodobne ste zadali zlé parametre!");
            }
        })
        .catch(error => {
            console.error('Chyba pri vykonávaní AJAX volania: ', error);
            alert("Jedlo nebolo pridané, pravdepodobne ste zadali zlé parametre!");
        });
}

// Funkcia na aktualizáciu zoznamu jedál
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
                    item += '<button onclick="editItem(' + value.jedlo_id + ')">Editovať</button><br>';
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

// Volanie funkcie refreshMenu pri načítaní stránky
document.addEventListener('DOMContentLoaded', function () {
    refreshMenu();
});
