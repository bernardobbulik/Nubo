(() => {
    document.addEventListener('DOMContentLoaded', () => {
        const progressItems = document.querySelectorAll('.progress-item');

        if (!progressItems.length) {
            return;
        }

        const animateItem = (item, index = 0) => {
            const progressBar = item.querySelector('.progress-bar');

            if (!(progressBar instanceof HTMLElement)) {
                return;
            }

            const value = Number(item.getAttribute('data-progress') || 0);
            const boundedValue = Math.max(0, Math.min(100, value));

            window.setTimeout(() => {
                progressBar.style.width = `${boundedValue}%`;
            }, 120 + index * 110);
        };

        if (!('IntersectionObserver' in window)) {
            progressItems.forEach((item, index) => {
                animateItem(item, index);
            });

            return;
        }

        const observer = new IntersectionObserver(
            (entries, currentObserver) => {
                entries.forEach((entry, index) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    animateItem(entry.target, index);
                    currentObserver.unobserve(entry.target);
                });
            },
            {
                threshold: 0.3,
            }
        );

        progressItems.forEach((item) => {
            observer.observe(item);
        });
    });
})();