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
 * Tambah halaman baru = cukup tambah entry di sini.
 */
$NAV_PAGES = [
    'tools1' => ['file' => 'index.php',  'label' => 'Tools 1', 'icon' => 'grid'],
    'tools2' => ['file' => 'tools2.php', 'label' => 'Tools 2', 'icon' => 'layers'],
    'build'  => ['file' => 'build.php',  'label' => 'Build',   'icon' => 'wrench'],
    'info'   => ['file' => 'info.php',   'label' => 'Info',    'icon' => 'info'],
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