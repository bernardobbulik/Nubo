<?php

declare(strict_types=1);

$bootstrapVars = [
    'pageTitle' => 'Your next workspace',
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require __DIR__ . '/../../app/partials/bootstrap.php'; ?>
    <link rel="icon" type="image/svg+xml" href="<?php echo $escape($assetUrl('icons/nubo-icon.svg')); ?>">
    <link rel="stylesheet" href="<?php echo $escape($assetUrl('style/base.css')); ?>">
    <link rel="stylesheet" href="<?php echo $escape($assetUrl('style/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo $escape($assetUrl('style/landing.css')); ?>">
</head>
<body class="page-landing">
    <div id="app-header"></div>

    <main>
        <section class="hero-section grid-surface">
            <div class="container hero-container">

                <div class="hero-copy text-center">
                    <h1 class="hero-title reveal-up delay-2">Freelancing,<br><span>simplified.</span></h1>
                    <p class="hero-description reveal-up delay-3">
                        Manage clients, projects, invoices, and your time — all in one clean workspace.
                        Built for independent professionals who value clarity.
                    </p>

                    <div class="hero-actions reveal-up delay-4">
                        <a href="<?php echo $escape($routeUrl('login')); ?>" class="btn btn-nubo btn-nubo-dark btn-nubo-lg">
                            Get started free
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="#features" class="btn btn-nubo btn-nubo-light btn-nubo-lg">See how it works</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="preview-section section-space">
            <div class="container">
                <div class="product-window reveal-up">
                    <div class="product-window-topbar">
                        <div class="window-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="window-search"></div>
                    </div>

                    <div class="product-window-body row g-4 align-items-start">
                        <div class="col-lg-3">
                            <div class="product-sidebar">
                                <div class="product-sidebar-badge"></div>
                                <button class="product-nav-item active">Dashboard</button>
                                <button class="product-nav-item">Projects</button>
                                <button class="product-nav-item">Clients</button>
                                <button class="product-nav-item">Invoices</button>
                                <button class="product-nav-item">Time</button>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="preview-top-cards">
                                <div class="preview-stat-card floating-card delay-1">
                                    <span>Revenue</span>
                                    <strong>$12,480</strong>
                                </div>
                                <div class="preview-stat-card floating-card delay-2">
                                    <span>Hours logged</span>
                                    <strong>164h</strong>
                                </div>
                                <div class="preview-stat-card floating-card delay-3">
                                    <span>Active projects</span>
                                    <strong>7</strong>
                                </div>
                            </div>

                            <div class="preview-chart-card">
                                <div class="preview-chart-bars">
                                    <span></span><span></span><span></span><span></span><span></span><span></span>
                                    <span></span><span></span><span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="features-section section-space pt-0">
            <div class="container">
                <div class="section-heading text-center reveal-up">
                    <h2>Everything you need. Nothing you don't.</h2>
                    <p>Nubo replaces scattered tools with one focused workspace.</p>
                </div>
                <div class="row g-4 feature-grid">
                    <div class="col-md-6 col-xl-4">
                        <article class="feature-card reveal-up delay-1">
                            <div class="feature-icon"><i class="bi bi-people"></i></div>
                            <h3>Client Management</h3>
                            <p>Keep every client organized with contacts, notes, and project history in one place.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <article class="feature-card reveal-up delay-2">
                            <div class="feature-icon"><i class="bi bi-kanban"></i></div>
                            <h3>Project Tracking</h3>
                            <p>Kanban boards, lists, and timelines — pick the view that fits how you work.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <article class="feature-card reveal-up delay-3">
                            <div class="feature-icon"><i class="bi bi-receipt"></i></div>
                            <h3>Invoicing</h3>
                            <p>Create and send professional invoices. Track payments automatically.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <article class="feature-card reveal-up delay-1">
                            <div class="feature-icon"><i class="bi bi-clock-history"></i></div>
                            <h3>Time Tracking</h3>
                            <p>Log hours per project with a single click. Bill accurately, every time.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <article class="feature-card reveal-up delay-2">
                            <div class="feature-icon"><i class="bi bi-bar-chart"></i></div>
                            <h3>Analytics</h3>
                            <p>See your revenue, hours, and growth at a glance. Make smarter decisions.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <article class="feature-card reveal-up delay-3">
                            <div class="feature-icon"><i class="bi bi-lightning-charge"></i></div>
                            <h3>Automations</h3>
                            <p>Set up recurring invoices, reminders, and workflows. Less busywork, more flow.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section section-space pt-0">
            <div class="container">
                <div class="cta-panel reveal-up">
                    <h2>Ready to simplify your freelance life?</h2>
                    <p>Join the waitlist and be the first to experience Nubo.</p>
                    <a href="<?php echo $escape($routeUrl('login')); ?>" class="btn btn-nubo btn-nubo-dark btn-nubo-lg">
                        Join the waitlist
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <div id="app-footer"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $escape($assetUrl('js/components.js')); ?>"></script>
    <script src="<?php echo $escape($assetUrl('js/main.js')); ?>"></script>
    <script src="<?php echo $escape($assetUrl('js/landing.js')); ?>"></script>
</body>
</html>