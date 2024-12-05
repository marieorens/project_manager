document.addEventListener('DOMContentLoaded', () => {
    const tectonicElements = document.querySelectorAll('.tectonic');
    tectonicElements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.5}s`;
    });
});