<?php

declare(strict_types=1);

$bootstrapVars = [
    'pageTitle' => 'Dashboard',
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require __DIR__ . '/../../app/partials/bootstrap.php'; ?>
    <link rel="icon" type="image/svg+xml" href="<?php echo $escape($assetUrl('icons/nubo-icon.svg')); ?>">
    <link rel="stylesheet" href="<?php echo $escape($assetUrl('style/base.css')); ?>">
    <link rel="stylesheet" href="<?php echo $escape($assetUrl('style/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo $escape($assetUrl('style/dashboard.css')); ?>">
</head>
<body class="page-dashboard">
    <div class="dashboard-shell">
        <aside id="app-sidebar"></aside>

        <div class="dashboard-main">
            <header class="dashboard-topbar">
                <button class="btn btn-icon dashboard-nav-toggle d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-label="Abrir navegação">
                    <i class="bi bi-layout-sidebar"></i>
                </button>

                <button class="btn btn-icon dashboard-nav-toggle d-none d-xl-inline-flex" type="button" aria-label="Navegação">
                    <i class="bi bi-layout-sidebar"></i>
                </button>

                <div class="topbar-actions ms-auto">
                    <div class="dropdown">
                        <button class="btn topbar-profile-toggle dropdown-toggle" type="button" id="topbarProfileMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="topbar-profile-avatar">NB</span>
                            <span class="topbar-profile-text">Profile</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end topbar-profile-menu" aria-labelledby="topbarProfileMenu">
                            <li><a class="dropdown-item" href="#">My profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo $escape($routeUrl('login')); ?>">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </header>

            <main class="dashboard-content container-fluid">
                <section id="dashboard-overview" class="dashboard-hero reveal-up">
                    <div>
                        <h1>Dashboard</h1>
                        <p>Welcome back. Here's your team overview.</p>
                    </div>

                    <button id="btnAddMember" class="btn btn-nubo btn-nubo-dark">
                        <span class="btn-label"><i class="bi bi-plus-lg"></i> Add member</span>
                        <span class="btn-loading">
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            Salvando...
                        </span>
                    </button>
                </section>

                <section id="products" class="stats-grid row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <article class="metric-card reveal-up delay-1">
                            <div class="metric-card-icon"><i class="bi bi-people"></i></div>
                            <div class="metric-card-trend positive"><i class="bi bi-arrow-up-right"></i> +2</div>
                            <strong>12</strong>
                            <span>Team Members</span>
                        </article>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <article class="metric-card reveal-up delay-2">
                            <div class="metric-card-icon"><i class="bi bi-kanban"></i></div>
                            <div class="metric-card-trend positive"><i class="bi bi-arrow-up-right"></i> +1</div>
                            <strong>7</strong>
                            <span>Active Projects</span>
                        </article>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <article class="metric-card reveal-up delay-3">
                            <div class="metric-card-icon"><i class="bi bi-currency-dollar"></i></div>
                            <div class="metric-card-trend positive"><i class="bi bi-arrow-up-right"></i> +12%</div>
                            <strong>$18,420</strong>
                            <span>Revenue (MTD)</span>
                        </article>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <article class="metric-card reveal-up delay-4">
                            <div class="metric-card-icon"><i class="bi bi-clock"></i></div>
                            <div class="metric-card-trend negative"><i class="bi bi-arrow-down-right"></i> -3%</div>
                            <strong>284h</strong>
                            <span>Hours Logged</span>
                        </article>
                    </div>
                </section>

                <section class="dashboard-panels row g-4 mt-2">
                    <div id="customers" class="col-xl-8">
                        <article class="panel-card reveal-up delay-2">
                            <div class="panel-card-header">
                                <h2>Team Members</h2>
                                <a href="#" class="panel-link">View all</a>
                            </div>

                            <div class="member-list">
                                <article class="member-row">
                                    <div class="member-avatar">CF</div>
                                    <div class="member-info">
                                        <strong>Cody Fisher</strong>
                                        <span>Frontend Developer</span>
                                    </div>
                                    <a href="mailto:cody@example.com" class="member-mail"><i class="bi bi-envelope"></i> cody@example.com</a>
                                    <span class="member-status online"></span>
                                </article>
                                <article class="member-row">
                                    <div class="member-avatar">RF</div>
                                    <div class="member-info">
                                        <strong>Robert Fox</strong>
                                        <span>UI Designer</span>
                                    </div>
                                    <a href="mailto:robert@example.com" class="member-mail"><i class="bi bi-envelope"></i> robert@example.com</a>
                                    <span class="member-status online"></span>
                                </article>
                                <article class="member-row">
                                    <div class="member-avatar">AF</div>
                                    <div class="member-info">
                                        <strong>Albert Flores</strong>
                                        <span>Backend Developer</span>
                                    </div>
                                    <a href="mailto:albert@example.com" class="member-mail"><i class="bi bi-envelope"></i> albert@example.com</a>
                                    <span class="member-status idle"></span>
                                </article>
                                <article class="member-row">
                                    <div class="member-avatar">FM</div>
                                    <div class="member-info">
                                        <strong>Floyd Miles</strong>
                                        <span>Project Manager</span>
                                    </div>
                                    <a href="mailto:floyd@example.com" class="member-mail"><i class="bi bi-envelope"></i> floyd@example.com</a>
                                    <span class="member-status online"></span>
                                </article>
                                <article class="member-row">
                                    <div class="member-avatar">JW</div>
                                    <div class="member-info">
                                        <strong>Jenny Wilson</strong>
                                        <span>QA Engineer</span>
                                    </div>
                                    <a href="mailto:jenny@example.com" class="member-mail"><i class="bi bi-envelope"></i> jenny@example.com</a>
                                    <div class="member-row-actions">
                                        <span class="member-status online"></span>
                                        <button class="btn btn-icon btn-row-action"><i class="bi bi-three-dots"></i></button>
                                    </div>
                                </article>
                                <article class="member-row">
                                    <div class="member-avatar">DL</div>
                                    <div class="member-info">
                                        <strong>Devon Lane</strong>
                                        <span>DevOps</span>
                                    </div>
                                    <a href="mailto:devon@example.com" class="member-mail"><i class="bi bi-envelope"></i> devon@example.com</a>
                                    <div class="member-row-actions">
                                        <span class="member-status offline"></span>
                                        <button class="btn btn-icon btn-row-action"><i class="bi bi-three-dots"></i></button>
                                    </div>
                                </article>
                            </div>
                        </article>
                    </div>

                    <div id="orders" class="col-xl-4">
                        <article class="panel-card reveal-up delay-3">
                            <div class="panel-card-header">
                                <h2>Recent Activity</h2>
                            </div>

                            <ul class="activity-list">
                                <li>
                                    <strong>Cody Fisher</strong> completed task <strong>Landing page redesign</strong>
                                    <span>2m ago</span>
                                </li>
                                <li>
                                    <strong>Robert Fox</strong> uploaded <strong>Brand guidelines v2.pdf</strong>
                                    <span>15m ago</span>
                                </li>
                                <li>
                                    <strong>Albert Flores</strong> created invoice <strong>#INV-0042</strong>
                                    <span>1h ago</span>
                                </li>
                                <li>
                                    <strong>Floyd Miles</strong> added comment on <strong>Sprint Review</strong>
                                    <span>2h ago</span>
                                </li>
                            </ul>
                        </article>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <div class="offcanvas offcanvas-start nubo-offcanvas" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
        <div class="offcanvas-body p-0" id="mobile-sidebar-body"></div>
    </div>

    <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content nubo-modal">
                <div class="modal-header">
                    <div>
                        <h2 class="modal-title" id="memberModalLabel">Add team member</h2>
                        <p class="modal-subtitle mb-0">Invite someone new to the Nubo workspace.</p>
                    </div>
                    <button type="button" class="btn btn-icon" data-bs-dismiss="modal" aria-label="Fechar">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <form id="memberForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="memberName" class="form-label">Full name</label>
                            <input type="text" class="form-control form-control-nubo" id="memberName" placeholder="Ex.: Jane Cooper" required>
                        </div>
                        <div class="mb-3">
                            <label for="memberEmail" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-nubo" id="memberEmail" placeholder="name@nubo.app" required>
                        </div>
                        <div class="mb-0">
                            <label for="memberRole" class="form-label">Role</label>
                            <input type="text" class="form-control form-control-nubo" id="memberRole" placeholder="Ex.: Product Designer" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-nubo btn-nubo-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-nubo btn-nubo-dark" id="btnSaveMember">
                            <span class="btn-label">Send invite</span>
                            <span class="btn-loading">
                                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                Enviando...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="successToast" class="toast nubo-toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <i class="bi bi-check2-circle"></i>
                <span>Member invited successfully.</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $escape($assetUrl('js/components.js')); ?>"></script>
    <script src="<?php echo $escape($assetUrl('js/main.js')); ?>"></script>
    <script src="<?php echo $escape($assetUrl('js/dashboard.js')); ?>"></script>
</body>
</html>
