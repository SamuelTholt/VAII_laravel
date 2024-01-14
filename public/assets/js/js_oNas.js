document.addEventListener('DOMContentLoaded', function() {
    let paragraphs = Array.from(document.querySelectorAll('p.lead'));
    let currentIndex = 0;

    function showNextParagraph() {
        // Skrytie aktuálneho odseku
        paragraphs[currentIndex].style.display = 'none';

        // Získanie indexu ďalšieho odseku
        currentIndex = (currentIndex + 1) % paragraphs.length;

        // Zobrazenie ďalšieho odseku
        paragraphs[currentIndex].style.display = 'block';
    }

    paragraphs.forEach((item, index) => {
        item.addEventListener('click', showNextParagraph);
    });

    setInterval(() => {
        showNextParagraph();
        // V tomto bode môžete pridať ďalšie kroky, ktoré chcete vykonať každých 10 sekúnd
    }, 10 * 1000);
});

