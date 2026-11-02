<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/icons.php';

$pageTitle   = 'Tools 2 · ' . APP_NAME;
$activePage  = 'tools2';
$pageHeading = 'Tools 2';
$pageSub     = APP_NAME;
$showStatus  = false;

$maintIcon = 'layers';
$maintDesc = 'Halaman Tools 2 sedang disiapkan. Balik lagi nanti ya.';

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/maintenance.php';
require __DIR__ . '/includes/toolbar.php';
require __DIR__ . '/includes/footer.php';