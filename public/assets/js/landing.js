(function () {
    const cards = document.querySelectorAll('.feature-card, .preview-stat-card, .cta-panel');

    cards.forEach((card) => {
        card.addEventListener('mousemove', (event) => {
            const bounds = card.getBoundingClientRect();
            const offsetX = event.clientX - bounds.left;
            const offsetY = event.clientY - bounds.top;
            const rotateY = ((offsetX / bounds.width) - 0.5) * 4;
            const rotateX = ((offsetY / bounds.height) - 0.5) * -4;

            card.style.transform = `perspective(1200px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-4px)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });
})();
