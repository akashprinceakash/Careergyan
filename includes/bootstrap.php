<?php
/**
 * Career Gyan — Template 03 bootstrap.
 *
 * Every page includes this first. It opens the existing MySQL connection
 * (admin/config.php) when available and otherwise runs on mock data, so the
 * template can be previewed locally with `php -S` and deployed unchanged.
 */

define('CG_ROOT', dirname(__DIR__));

// ---------- Database (optional) ----------
function cg_db()
{
    static $db = false;
    if ($db !== false) {
        return $db;
    }
    $db = null;
    $config = CG_ROOT . '/admin/config.php';
    if (is_file($config) && function_exists('mysqli_connect')) {
        mysqli_report(MYSQLI_REPORT_OFF);
        ob_start();
        include $config;            // defines DB_* and $db
        ob_end_clean();
        if (!empty($db) && !mysqli_connect_errno()) {
            mysqli_set_charset($db, 'utf8mb4');
        } else {
            $db = null;
        }
    }
    return $db;
}

function cg_live()
{
    return cg_db() !== null;
}

/** Run a prepared SELECT and return all rows (empty array on any failure). */
function cg_query($sql, array $params = [])
{
    $db = cg_db();
    if (!$db) {
        return [];
    }
    $stmt = mysqli_prepare($db, $sql);
    if (!$stmt) {
        return [];
    }
    if ($params) {
        mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
    }
    if (!mysqli_stmt_execute($stmt)) {
        return [];
    }
    $res = mysqli_stmt_get_result($stmt);
    $rows = $res ? mysqli_fetch_all($res, MYSQLI_ASSOC) : [];
    mysqli_stmt_close($stmt);
    return $rows;
}

// ---------- Helpers ----------
function e($v)
{
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}

function cg_excerpt($html, $len = 150)
{
    $t = trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags((string) $html), ENT_QUOTES, 'UTF-8')));
    $mb = function_exists('mb_strlen');
    if (($mb ? mb_strlen($t) : strlen($t)) <= $len) {
        return $t;
    }
    $t = $mb ? mb_substr($t, 0, $len) : substr($t, 0, $len);
    return preg_replace('/\s+\S*$/u', '', $t) . '…';
}

function cg_date($s, $fmt = 'j M Y')
{
    $t = strtotime((string) $s);
    return $t ? date($fmt, $t) : '';
}

/** Image path for DB-managed content; mock rows ship their own asset paths. */
function cg_img($folder, $file)
{
    if ($file === '' || $file === null) {
        return 'assets/img/banners/campus.jpg';
    }
    if (strpos($file, 'assets/') === 0 || strpos($file, 'http') === 0) {
        return $file;
    }
    return 'images/content/' . $folder . '/' . rawurlencode($file);
}

function cg_blog_url($slug)
{
    return 'blogs/' . rawurlencode($slug);
}

function cg_event_url($slug)
{
    return 'event_details.php?slug=' . rawurlencode($slug);
}

// Base href so /blogs/slug rewrites resolve assets correctly
function cg_base()
{
    $dir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
    return $dir . '/';
}

require __DIR__ . '/data.php';
require __DIR__ . '/partials.php';
