(function () {
    window.NuboUI = {
        setButtonLoading(button, isLoading) {
            if (!button) return;
            button.classList.toggle('is-loading', isLoading);
            button.disabled = isLoading;
            button.setAttribute('aria-busy', String(isLoading));
        },

        showToast(toastId) {
            const element = document.getElementById(toastId);
            if (!element || typeof bootstrap === 'undefined') return;
            bootstrap.Toast.getOrCreateInstance(element, { delay: 2600 }).show();
        },

        bindModalShortcuts(modalSelector, submitCallback) {
            const modalElement = document.querySelector(modalSelector);
            if (!modalElement) return;

            modalElement.addEventListener('shown.bs.modal', () => {
                const firstInput = modalElement.querySelector('input, textarea, select');
                firstInput?.focus();
            });

            modalElement.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    bootstrap.Modal.getOrCreateInstance(modalElement).hide();
                }

                if (event.key === 'Enter' && event.target.tagName !== 'TEXTAREA') {
                    const submitter = typeof submitCallback === 'function' ? submitCallback() : null;
                    if (submitter) {
                        event.preventDefault();
                        submitter.click();
                    }
                }
            });
        }
    };
})();
