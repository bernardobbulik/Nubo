(function () {
    const headerContainer = document.getElementById('app-header');
    const footerContainer = document.getElementById('app-footer');
    const sidebarContainer = document.getElementById('app-sidebar');
    const mobileSidebarBody = document.getElementById('mobile-sidebar-body');

    const currentPage = document.body.dataset.page || document.body.className;

    const pathParts = window.location.pathname.split('/').filter(Boolean);
    const basePath = pathParts.length > 0 ? `/${pathParts[0]}` : '';
    const assetBase = `${basePath}/public/assets`;

    const routeUrl = (route) => {
        if (route === 'landing') {
            return `${basePath}/`;
        }

        return `${basePath}/${route}`;
    };

    const brandMarkup = `
        <a href="${routeUrl('landing')}" class="brand-link brand-link-dark" aria-label="Nubo">
            <img src="${assetBase}/icons/nubo-logo.svg" alt="Nubo" class="brand-logo">
        </a>
    `;

    const sidebarMarkup = `
        <div class="dashboard-sidebar">
            <div class="dashboard-sidebar-brand">${brandMarkup}</div>
            <div class="sidebar-section-title">Workspace</div>
            <nav class="sidebar-nav">
                <a href="${routeUrl('home')}" class="sidebar-link ${currentPage.includes('home') || currentPage.includes('dashboard') ? 'active' : ''}"><i class="bi bi-grid"></i> Dashboard</a>
                <a href="#" class="sidebar-link"><i class="bi bi-people"></i> Team</a>
                <a href="#" class="sidebar-link"><i class="bi bi-kanban"></i> Projects</a>
                <a href="#" class="sidebar-link"><i class="bi bi-receipt"></i> Invoices</a>
                <a href="#" class="sidebar-link"><i class="bi bi-clock"></i> Time Tracking</a>
            </nav>
            <div class="sidebar-spacer"></div>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-footer-link"><i class="bi bi-bell"></i> Notifications</a>
                <a href="#" class="sidebar-footer-link"><i class="bi bi-gear"></i> Settings</a>
            </div>
        </div>
    `;

    if (headerContainer) {
        headerContainer.innerHTML = `
            <header class="app-header">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        ${brandMarkup}
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#landingNavbar" aria-controls="landingNavbar" aria-expanded="false" aria-label="Alternar navegação">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="landingNavbar">
                            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                                <li class="nav-item"><a class="nav-link nav-link-soft" href="#features">Features</a></li>
                                <li class="nav-item"><a class="btn btn-nubo btn-nubo-dark" href="${routeUrl('login')}">Get early access</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        `;
    }

    if (footerContainer) {
        footerContainer.innerHTML = `
            <footer class="app-footer">
                <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                    ${brandMarkup}
                    <p class="text-center text-md-end" style="color: var(--nubo-text-soft);">© 2026 Nubo. Built for freelancers.</p>
                </div>
            </footer>
        `;
    }

    if (sidebarContainer) {
        sidebarContainer.innerHTML = sidebarMarkup;
    }

    if (mobileSidebarBody) {
        mobileSidebarBody.innerHTML = sidebarMarkup;
    }
})();
