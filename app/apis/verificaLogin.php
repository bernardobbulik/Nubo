<?php

require_once __DIR__ . '/../core/config.php';

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    http_response_code(405);
    exit;
}

$login = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$scriptName = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
$basePath = preg_replace('#/app/apis/verificaLogin\.php$#', '', $scriptName) ?: '';

$stmt = $db->prepare('SELECT cdusuario, nome, tipo, cdliderwp FROM usuarios WHERE login = :login AND senha = :senha LIMIT 1');
$stmt->execute([
    ':login' => $login,
    ':senha' => $senha,
]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $_SESSION['cdusuario'] = $user['cdusuario'];
    $_SESSION['nome'] = $user['nome'];
    $_SESSION['tipo'] = $user['tipo'];
    $_SESSION['cdlider'] = $user['cdlider'];

    header('Location: ' . $basePath . '/home');
    exit;
}

header('Location: ' . $basePath . '/login?error=1', true, 302);
exit;
