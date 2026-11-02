<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/icons.php';

$pageTitle   = 'Build · ' . APP_NAME;
$activePage  = 'build';
$pageHeading = 'Build';
$pageSub     = APP_NAME;
$showStatus  = false;

$maintIcon = 'wrench';
$maintDesc = 'Halaman Build sedang dikerjakan. Sabar ya.';

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/maintenance.php';
require __DIR__ . '/includes/toolbar.php';
require __DIR__ . '/includes/footer.php';