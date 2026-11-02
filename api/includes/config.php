<?php
declare(strict_types=1);

/**
 * FastDev Free Tools — Config
 * Semua konfigurasi global & helper ada di sini.
 */

const APP_NAME    = 'FastDev Free Tools';
const APP_SHORT   = 'FastDev';
const APP_VERSION = '0.1';
const APP_YEAR    = '2026';

/**
 * Daftar halaman untuk toolbar bottom.
 * Pakai URL bersih (lihat rewrites di vercel.json).
 */
$NAV_PAGES = [
    'tools1' => ['url' => '/',       'label' => 'Tools 1', 'icon' => 'grid'],
    'tools2' => ['url' => '/tools2', 'label' => 'Tools 2', 'icon' => 'layers'],
    'build'  => ['url' => '/build',  'label' => 'Build',   'icon' => 'wrench'],
    'info'   => ['url' => '/info',   'label' => 'Info',    'icon' => 'info'],
];

/**
 * Escape string untuk output HTML.
 */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Cek apakah halaman saat ini aktif.
 */
function active_class(string $key, string $active): string
{
    return $key === $active ? ' is-active' : '';
}

/**
 * Aria-current helper.
 */
function aria_current(string $key, string $active): string
{
    return $key === $active ? ' aria-current="page"' : '';
}