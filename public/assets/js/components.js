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

    const currentHash = window.location.hash.toLowerCase();
    const isDashboardPage = currentPage.includes('home') || currentPage.includes('dashboard');

    const navItems = [
        {
            label: 'Home',
            icon: 'bi-house-door',
            href: routeUrl('home'),
            active: currentPage.includes('home'),
        },
        {
            label: 'Projects',
            icon: 'bi-table',
            href: `${routeUrl('projects')}`,
            active: isDashboardPage,
        },
        {
            label: 'Products',
            icon: 'bi-grid',
            href: `${routeUrl('home')}#products`,
            active: isDashboardPage && currentHash === '#products',
        },
        {
            label: 'Customers',
            icon: 'bi-people',
            href: `${routeUrl('home')}#customers`,
            active: isDashboardPage && currentHash === '#customers',
        },
    ];

    const tooltipAttrs = (label, mobile) => {
        if (mobile) {
            return '';
        }

        return `data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="${label}"`;
    };

    const buildSidebarMarkup = (mobile = false) => {
        const dropdownId = mobile ? 'sidebarUserMobile' : 'sidebarUserDesktop';
        const sidebarClass = mobile
            ? 'dashboard-sidebar dashboard-sidebar-icon dashboard-sidebar-icon--mobile d-flex flex-column flex-shrink-0 bg-light'
            : 'dashboard-sidebar dashboard-sidebar-icon d-flex flex-column flex-shrink-0 bg-light';

        const itemMarkup = navItems.map((item) => {
            const currentAttribute = item.active ? 'aria-current="page"' : '';

            return `
                <li class="nav-item">
                    <a href="${item.href}" class="nav-link py-3 border-bottom ${item.active ? 'active' : ''}" ${currentAttribute} ${tooltipAttrs(item.label, mobile)}>
                        <i class="bi ${item.icon}" role="img" aria-label="${item.label}"></i>
                        <span class="sidebar-item-label">${item.label}</span>
                    </a>
                </li>
            `;
        }).join('');

        return `
            <div class="${sidebarClass}">
                <a href="${routeUrl('landing')}" class="d-block p-3 link-dark text-decoration-none dashboard-sidebar-brand" ${tooltipAttrs('Nubo', mobile)}>
                    <img src="${assetBase}/icons/nubo-icon.svg" alt="Nubo" class="dashboard-sidebar-brand-icon">
                    <span class="sidebar-item-label">Nubo</span>
                </a>
                <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                    ${itemMarkup}
                </ul>
                <div class="dropdown border-top sidebar-profile-dropdown">
                    <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle sidebar-profile-toggle" id="${dropdownId}" data-bs-toggle="dropdown" aria-expanded="false" ${tooltipAttrs('Profile', mobile)}>
                        <span class="sidebar-avatar">NB</span>
                        <span class="sidebar-item-label">Profile</span>
                    </a>
                    <ul class="dropdown-menu text-small shadow sidebar-dropdown-menu" aria-labelledby="${dropdownId}">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="${routeUrl('login')}">Sign out</a></li>
                    </ul>
                </div>
            </div>
        `;
    };

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
        sidebarContainer.innerHTML = buildSidebarMarkup(false);
    }

    if (mobileSidebarBody) {
        mobileSidebarBody.innerHTML = buildSidebarMarkup(true);
    }

    if (typeof bootstrap !== 'undefined') {
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((element) => {
            bootstrap.Tooltip.getOrCreateInstance(element);
        });
    }
})();
