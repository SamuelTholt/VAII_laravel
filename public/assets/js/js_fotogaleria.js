function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}

var csrfToken = getCookie('XSRF-TOKEN');
function refreshPhotos() {
    fetch('/fotogaleria/data')
        .then(response => response.json())
        .then(data => {
            var foodGalleryContainer = document.getElementById('food-gallery-container');
            var restaurantGalleryContainer = document.getElementById('restaurant-gallery-container');

            data.forEach(function (value) {
                if (isValidImageURL(value.obrazok)) {

                    var img = document.createElement('img');
                    img.src = value.obrazok;
                    img.alt = value.nazov;
                    img.className = 'img-fluid img-thumbnail';

                    var link = document.createElement('a');
                    link.classList.add('d-block', 'mb-4', 'h-100');
                    link.appendChild(img);

                    var name = document.createElement('p');
                    name.textContent = value.nazov;
                    name.className = 'text-center whiteColor';
                    link.appendChild(name);

                    if (isAdmin) {
                        var editButton = document.createElement('button');
                        editButton.textContent = 'Edit';
                        editButton.className = 'btn btn-primary';
                        editButton.onclick = function () {
                            window.location.href = '/fotogaleria/' + value.foto_id + '/edit';
                        };
                        link.appendChild(editButton);

                        var deleteButton = document.createElement('button');
                        deleteButton.textContent = 'Delete';
                        deleteButton.className = 'btn btn-danger';
                        deleteButton.onclick = function () {
                            if (confirm('Are you sure you want to delete ' + value.nazov + '?')) {
                                var deleteForm = document.createElement('form');
                                deleteForm.action = '/fotogaleria/' + value.foto_id;
                                deleteForm.method = 'POST';

                                var methodField = document.createElement('input');
                                methodField.type = 'hidden';
                                methodField.name = '_method';
                                methodField.value = 'DELETE';
                                deleteForm.appendChild(methodField);

                                var csrfField = document.createElement('input');
                                csrfField.type = 'hidden';
                                csrfField.name = '_token';
                                csrfField.value = document.querySelector('meta[name="csrf-token"]').content;
                                deleteForm.appendChild(csrfField);

                                document.body.appendChild(deleteForm);
                                deleteForm.submit();
                            }
                        };

                        link.appendChild(deleteButton);
                    }

                    if (value.typ_id === 1) {
                        foodGalleryContainer.appendChild(link);
                    } else if (value.typ_id === 2) {
                        restaurantGalleryContainer.appendChild(link);
                    }

                }
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Function to check if the URL ends with a valid image extension
function isValidImageURL(url) {
    var validExtensions = ['.jpg', '.jpeg', '.png', '.gif', '.bmp']; // Add more if needed
    return validExtensions.some(ext => url.toLowerCase().endsWith(ext));
}

document.addEventListener('DOMContentLoaded', function () {
    refreshPhotos();
});

function toggle() {
    var form = document.getElementById('addItemForm');
    form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
}
