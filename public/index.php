<?php

define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');

session_save_path(ROOT_PATH . '/storage/sessions');
session_start();

spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }

    $relative = str_replace('\\', '/', substr($class, strlen($prefix)));
    $file = APP_PATH . '/' . $relative . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

function app_base_path(): string
{
    $script = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $script = rtrim($script, '/');

    return $script === '/' ? '' : $script;
}

function url(string $path = ''): string
{
    return app_base_path() . '/' . ltrim($path, '/');
}

function asset(string $path): string
{
    return url('/public/assets/' . ltrim($path, '/'));
}

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function is_admin(): bool
{
    return isset($_SESSION['admin']);
}

function flash(string $key, ?string $value = null): ?string
{
    if ($value !== null) {
        $_SESSION['_flash'][$key] = $value;
        return null;
    }

    $message = $_SESSION['_flash'][$key] ?? null;
    unset($_SESSION['_flash'][$key]);

    return $message;
}

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$base = app_base_path();

if ($base !== '' && substr($uri, 0, strlen($base)) === $base) {
    $uri = substr($uri, strlen($base));
}

$path = '/' . trim($uri, '/');
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($method === 'HEAD') {
    $method = 'GET';
}

use App\Controllers\AdminController;
use App\Controllers\CatalogController;

$catalog = new CatalogController();
$admin = new AdminController();

if ($path === '/' && $method === 'GET') {
    $catalog->index();
    return;
}

if ($path === '/contact' && $method === 'GET') {
    $catalog->contact();
    return;
}

if ($path === '/admin/login' && $method === 'GET') {
    $admin->login();
    return;
}

if ($path === '/admin/login' && $method === 'POST') {
    $admin->authenticate();
    return;
}

if ($path === '/admin/logout') {
    $admin->logout();
    return;
}

if ($path === '/admin' && $method === 'GET') {
    $admin->index();
    return;
}

if ($path === '/admin/create' && $method === 'GET') {
    $admin->create();
    return;
}

if ($path === '/admin/store' && $method === 'POST') {
    $admin->store();
    return;
}

if (preg_match('#^/admin/edit/(\d+)$#', $path, $matches) && $method === 'GET') {
    $admin->edit((int) $matches[1]);
    return;
}

if (preg_match('#^/admin/update/(\d+)$#', $path, $matches) && $method === 'POST') {
    $admin->update((int) $matches[1]);
    return;
}

if (preg_match('#^/admin/delete/(\d+)$#', $path, $matches) && $method === 'POST') {
    $admin->delete((int) $matches[1]);
    return;
}

http_response_code(404);
echo 'Halaman tidak ditemukan.';
