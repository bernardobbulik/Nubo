(() => {
    document.addEventListener('DOMContentLoaded', () => {
        const yearElements = document.querySelectorAll('[data-current-year]');
        const currentYear = new Date().getFullYear();

        yearElements.forEach((element) => {
            element.textContent = String(currentYear);
        });

        const nav = document.querySelector('.site-nav');

        if (nav) {
            const toggleScrolledClass = () => {
                nav.classList.toggle('is-scrolled', window.scrollY > 12);
            };

            toggleScrolledClass();
            window.addEventListener('scroll', toggleScrolledClass, { passive: true });
        }

        const revealElements = document.querySelectorAll('[data-reveal]');

        if (!revealElements.length) {
            return;
        }

        const reveal = (element) => {
            element.classList.add('is-visible');
        };

        if (!('IntersectionObserver' in window)) {
            revealElements.forEach(reveal);
            return;
        }

        const observer = new IntersectionObserver(
            (entries, currentObserver) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    reveal(entry.target);
                    currentObserver.unobserve(entry.target);
                });
            },
            {
                threshold: 0.15,
                rootMargin: '0px 0px -8% 0px',
            }
        );

        revealElements.forEach((element) => {
            observer.observe(element);
        });
    });
})();