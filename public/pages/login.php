<?php

declare(strict_types=1);

$bootstrapVars = [
    'pageTitle' => 'Login',
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require __DIR__ . '/../../app/partials/bootstrap.php'; ?>
    <link rel="icon" type="image/svg+xml" href="<?php echo $escape($assetUrl('icons/nubo-icon.svg')); ?>">
    <link rel="stylesheet" href="<?php echo $escape($assetUrl('style/base.css')); ?>">
    <link rel="stylesheet" href="<?php echo $escape($assetUrl('style/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo $escape($assetUrl('style/login.css')); ?>">
</head>
<body class="page-login">
    <main class="login-shell">
        <section class="login-form-panel">
            <div class="login-brand reveal-up">
                <a href="<?php echo $escape($routeUrl('landing')); ?>" class="brand-link brand-link-dark">
                    <img src="<?php echo $escape($assetUrl('icons/nubo-logo.svg')); ?>" alt="Nubo" class="brand-logo">
                </a>
            </div>

            <div class="login-card reveal-up delay-2">
                <header class="login-copy">
                    <h1>Welcome back</h1>
                    <p>to your workspace</p>
                </header>

                <form id="loginForm" class="login-form" action="<?php echo $escape($basePath . '/app/apis/verificaLogin.php'); ?>" method="POST">
                    <div class="mb-4">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" id="loginEmail" name="email" class="form-control form-control-nubo" placeholder="you@example.com" required>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label for="loginPassword" class="form-label mb-0">Password</label>
                            <a href="#" class="login-link">Forgot password?</a>
                        </div>
                        <div class="password-field">
                            <input type="password" id="loginPassword" name="senha" class="form-control form-control-nubo" placeholder="••••••••" required>
                            <button class="btn btn-icon password-toggle" type="button" id="togglePassword" aria-label="Alternar visibilidade da senha">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button id="btnLogin" type="submit" class="btn btn-nubo btn-nubo-dark btn-nubo-block btn-nubo-lg">
                        <span class="btn-label">Sign in <i class="bi bi-arrow-right"></i></span>
                        <span class="btn-loading">
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            Entrando...
                        </span>
                    </button>
                </form>

                <div class="login-divider"><span>or continue with</span></div>

                <button class="btn btn-social" type="button">
                    <svg width="22" height="22" viewBox="0 0 48 48" aria-hidden="true">
                        <path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303C33.655 32.657 29.215 36 24 36c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.27 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/>
                        <path fill="#FF3D00" d="M6.306 14.691l6.571 4.819C14.655 16.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.27 4 24 4c-7.682 0-14.318 4.337-17.694 10.691z"/>
                        <path fill="#4CAF50" d="M24 44c5.117 0 9.815-1.946 13.373-5.118l-6.19-5.238C29.126 35.091 26.682 36 24 36c-5.194 0-9.623-3.316-11.283-7.946l-6.522 5.025C9.526 39.556 16.227 44 24 44z"/>
                        <path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303c-.793 2.339-2.296 4.345-4.12 5.644l.003-.002 6.19 5.238C36.938 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"/>
                    </svg>
                    Google
                </button>

                <p class="login-signup">Don't have an account? <a href="#">Sign up</a></p>
            </div>
        </section>

        <section class="login-visual-panel">
            <div class="login-visual-inner">
                <div class="network-cluster">
                    <svg class="network-static" viewBox="0 0 260 220" role="img" aria-label="Connected workspace network">
                        <g class="network-lines">
                            <line x1="58" y1="72" x2="130" y2="50"></line>
                            <line x1="130" y1="50" x2="178" y2="106"></line>
                            <line x1="178" y1="106" x2="158" y2="168"></line>
                            <line x1="158" y1="168" x2="88" y2="146"></line>
                            <line x1="88" y1="146" x2="58" y2="72"></line>
                        </g>
                        <g class="network-nodes">
                            <circle cx="58" cy="72" r="7"></circle>
                            <circle cx="130" cy="50" r="8.5" class="node-highlight"></circle>
                            <circle cx="178" cy="106" r="8.5" class="node-highlight"></circle>
                            <circle cx="158" cy="168" r="6"></circle>
                            <circle cx="88" cy="146" r="7"></circle>
                        </g>
                    </svg>

                    <div class="network-copy">
                        <p>Your freelance workspace,</p>
                        <strong>always in sync.</strong>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="loginToast" class="toast nubo-toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <i class="bi bi-check2-circle"></i>
                <span>Authentication simulated successfully.</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $escape($assetUrl('js/components.js')); ?>"></script>
    <script src="<?php echo $escape($assetUrl('js/main.js')); ?>"></script>
    <script src="<?php echo $escape($assetUrl('js/login.js')); ?>"></script>
</body>
</html>
