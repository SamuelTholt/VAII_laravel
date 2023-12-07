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
            var pocty = [0, 0, 0, 0, 0];

            for (var k = 0; k < data.length; k++)
            {
                pocty[data[k] - 1]++;
            }

            var pocet1 = pocty[0];
            var pocet2 = pocty[1];
            var pocet3 = pocty[2];
            var pocet4 = pocty[3];
            var pocet5 = pocty[4];

            document.getElementById('pocet1').textContent = '⭐ ☆ ☆ ☆ ☆: ' + pocet1 + " / " + data.length;
            document.getElementById('pocet2').textContent = '⭐⭐ ☆ ☆ ☆: ' + pocet2 + " / " + data.length;
            document.getElementById('pocet3').textContent = '⭐⭐⭐ ☆ ☆: ' + pocet3 + " / " + data.length;
            document.getElementById('pocet4').textContent = '⭐⭐⭐⭐ ☆: ' + pocet4 + " / " + data.length;
            document.getElementById('pocet5').textContent = '⭐⭐⭐⭐⭐: ' + pocet5 + " / " + data.length;
        })
        .catch(error => console.error('Error:', error));

}

vypocitajPocetHviezd();
