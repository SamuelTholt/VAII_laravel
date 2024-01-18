function addPhoto() {
    var nazov = document.getElementById('nazov').value;
    var typ_id = document.getElementById('typ_id').value;
    var obrazok = document.getElementById('obrazok').files[0];

    var formData = new FormData();
    formData.append('nazov', nazov);
    formData.append('typ_id', typ_id);
    formData.append('obrazok', obrazok);

    fetch('/fotogaleria/add', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(data.message);
                alert(formData.get('nazov') + " - Fotka bola pridaná!");
            } else {
                console.error(data.message);
                alert("Fotka nebola pridaná, pravdepodobne ste zadali zlé parametre!");
            }
        })
        .catch(error => {
            console.error('Chyba pri vykonávaní AJAX volania: ', error);
            alert("Fotka nebola pridaná, pravdepodobne ste zadali zlé parametre!");
        });

    refreshPhotos();
}

function refreshPhotos() {
    fetch('/fotogaleria/data')
        .then(response => response.json())
        .then(data => {
            var galleryContainer = document.getElementById('gallery-container');
            galleryContainer.innerHTML = ''; // Clear the gallery container

            data.forEach(function (value) {
                var img = document.createElement('img');
                img.src = value.obrazok;
                img.alt = value.nazov;
                img.className = 'img-fluid img-thumbnail'; // Add classes for styling

                var link = document.createElement('a');
                link.href = '#'; // Add your link destination if needed
                link.classList.add('d-block', 'mb-4', 'h-100');

                link.appendChild(img);
                galleryContainer.appendChild(link);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


document.addEventListener('DOMContentLoaded', function () {
    refreshPhotos();
});

document.addEventListener('DOMContentLoaded', function () {
    refreshPhotos();
});

function toggle() {
    var form = document.getElementById('addItemForm');
    form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
}
