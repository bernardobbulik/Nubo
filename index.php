<?php

declare(strict_types=1);

$routes = [
    'landing' => [
        'view' => '/public/pages/landing.php',
    ],
    'login' => [
        'view' => '/public/pages/login.php',
    ],
    'home' => [
        'view' => '/public/pages/home.php',
    ],
    'dashboard' => [
        'view' => '/public/pages/home.php',
    ],
];

$aliases = [
    '' => 'landing',
    'index.php' => 'landing',
    'login.php' => 'login',
    'home.php' => 'home',
    'dashboard.php' => 'dashboard',
    'landing.php' => 'landing',
    'public/pages/login.php' => 'login',
    'public/pages/home.php' => 'home',
    'public/pages/dashboard.php' => 'dashboard',
    'app/apis/verificaLogin.php' => 'verificaLogin',
];

$requestUri = (string) ($_SERVER['REQUEST_URI'] ?? '/');
$requestPath = parse_url($requestUri, PHP_URL_PATH);

if (!is_string($requestPath) || $requestPath === '') {
    $requestPath = '/';
}

$scriptName = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
$basePath = rtrim(dirname($scriptName), '/.');

if ($basePath === '/' || $basePath === '\\') {
    $basePath = '';
}

if ($basePath !== '' && strpos($requestPath, $basePath) === 0) {
    $requestPath = substr($requestPath, strlen($basePath)) ?: '/';
}

$normalizedRoute = strtolower(trim(preg_replace('~/+~', '/', $requestPath) ?: $requestPath, '/'));

if (array_key_exists($normalizedRoute, $aliases)) {
    $canonicalRoute = $aliases[$normalizedRoute];

    if ($normalizedRoute !== $canonicalRoute) {
        $query = (string) ($_SERVER['QUERY_STRING'] ?? '');
        $target = ($basePath !== '' ? $basePath : '') . '/' . $canonicalRoute;

        if ($query !== '') {
            $target .= '?' . $query;
        }

        header('Location: ' . $target, true, 302);
        exit;
    }

    $normalizedRoute = $canonicalRoute;
}

if (!array_key_exists($normalizedRoute, $routes)) {
    http_response_code(404);
    echo '404 - Page not found';
    exit;
}

$routeMap = array_fill_keys(array_keys($routes), null);
$currentRoute = $normalizedRoute;

require __DIR__ . $routes[$normalizedRoute]['view'];