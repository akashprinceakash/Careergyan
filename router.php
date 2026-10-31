<?php
/**
 * Local development router only (production uses .htaccess):
 *   php -S 127.0.0.1:8080 router.php
 */
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path !== '/' && is_file(__DIR__ . $path)) {
    return false;   // static file or existing .php page
}
if (preg_match('#^/blogs/([^/]+)/?$#', $path, $m)) {
    $_GET['slug'] = urldecode($m[1]);
    $_SERVER['SCRIPT_NAME'] = '/blog_details.php';
    require __DIR__ . '/blog_details.php';
    return true;
}
if ($path === '/' || $path === '/blogs') {
    require __DIR__ . ($path === '/' ? '/index.php' : '/blogs.php');
    return true;
}
http_response_code(404);
$_SERVER['SCRIPT_NAME'] = '/404.php';
require __DIR__ . '/404.php';
