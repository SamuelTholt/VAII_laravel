function vypocitajPriemer() {
    var url = "api/starRatings";

    fetch(url)
        .then(response => response.json())
        .then(data => {
            var sum = data.reduce(function (a, b) {
                return a + b;
            }, 0);

            var priemer = data.length ? (sum / data.length).toFixed(2) : 0;

            document.getElementById('average').textContent = 'Priemerné hodnotenie: ' + priemer + '/5';
        })
        .catch(error => console.error('Error:', error));
}

vypocitajPriemer();

function vypocitajPocetHviezd() {
    var url2 = "api/starRatings";

    fetch(url2)
        .then(response => response.json())
        .then(data => {
            var counts = [0, 0, 0, 0, 0]; // Initialize counts for each star rating

            for (var i = 0; i < data.length; i++) {
                counts[data[i] - 1]++; // Increment the count for the current star rating
            }

            for (var j = 0; j < counts.length; j++) {
                console.log((j + 1) + ' star(s): ' + counts[i]);
            }
        })
        .catch(error => console.error('Error:', error));

}

vypocitajPocetHviezd();
