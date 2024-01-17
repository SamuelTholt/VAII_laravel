document.addEventListener('DOMContentLoaded', function () {
    const openingHours = document.getElementById('openingHours');
    const days = ["Pon", "Ut", "Str", "Štv", "Pia", "Sob", "Ne"];
    const hours = ["12:00 - 22:00", "12:00 - 22:00", "12:00 - 22:00", "12:00 - 22:00", "10:00 - 0:00", "12:00 - 0:00", "12:00 - 22:00"];

    function displayOpeningHours(index) {
        if (index < days.length) {
            openingHours.innerHTML += `<span class="bold">${days[index]}:</span> ${hours[index]}<br>`;
            setTimeout(function () {
                displayOpeningHours(index + 1);
            },  1000);
        }
    }
    displayOpeningHours(0);

});

document.addEventListener('DOMContentLoaded', function() {
    var emailElement = document.getElementById('email');
    var phoneElement = document.getElementById('phone');

    emailElement.addEventListener('click', function() {
        emailElement.textContent = 'LKRestaurant@gmail.com';
    });

    phoneElement.addEventListener('click', function() {
        phoneElement.textContent = '+421 442 069 943, 044/206 99 43';
    });
});


