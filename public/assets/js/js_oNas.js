document.addEventListener('DOMContentLoaded', function() {
    let paragraphs = Array.from(document.querySelectorAll('p.lead'));
    let currentIndex = 0;

    function showNextParagraph() {
        paragraphs[currentIndex].style.display = 'none';

        currentIndex = (currentIndex + 1) % paragraphs.length;

        paragraphs[currentIndex].style.display = 'block';
    }

    paragraphs.forEach((item, index) => {
        item.addEventListener('click', showNextParagraph);
    });

    setInterval(() => {
        showNextParagraph();
    }, 30 * 1000);
});

