<?php

declare(strict_types=1);

$bootstrapVars = $bootstrapVars ?? [];

if (!is_array($bootstrapVars)) {
    $bootstrapVars = [];
}

$defaults = [
    'pageTitle' => '',
    'routeMap' => is_array($routeMap ?? null) ? $routeMap : [],
    'currentRoute' => (string) ($currentRoute ?? ''),
];

$bootstrapData = array_merge($defaults, $bootstrapVars);
extract($bootstrapData, EXTR_SKIP);

require_once __DIR__ . '/../core/db.php';

$scriptName = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
$basePath = rtrim(dirname($scriptName), '/.');

if ($basePath === '/' || $basePath === '\\') {
    $basePath = '';
}

$assetBase = $basePath . '/public/assets';
$routeMap = is_array($routeMap) ? $routeMap : [];

$escape = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

$routeUrl = static function (string $route, array $query = []) use ($routeMap, $basePath): string {
    $safeRoute = trim($route, '/');

    if ($safeRoute === '' || !array_key_exists($safeRoute, $routeMap)) {
        $safeRoute = 'login';
    }

    $url = ($basePath !== '' ? $basePath : '') . '/' . $safeRoute;

    if ($query !== []) {
        $queryString = http_build_query($query);

        if ($queryString !== '') {
            $url .= '?' . $queryString;
        }
    }

    return $url;
};

$assetUrl = static function (string $relativePath = '') use ($assetBase): string {
    $cleanPath = ltrim($relativePath, '/');

    if ($cleanPath === '') {
        return $assetBase;
    }

    return $assetBase . '/' . $cleanPath;
};
?>
<title>Nubo | <?php echo $escape((string) $pageTitle); ?></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap"
    rel="stylesheet"
/>
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
/>
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
/>
<link rel="stylesheet" href="<?php echo $escape($assetUrl('style/general.css')); ?>" />