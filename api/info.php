<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/icons.php';

$pageTitle   = 'Info · ' . APP_NAME;
$activePage  = 'info';
$pageHeading = 'Info';
$pageSub     = APP_NAME;
$showStatus  = false;

$maintIcon = 'info';
$maintDesc = 'Halaman Info sedang diperbarui. Terima kasih sudah mampir.';

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/maintenance.php';
require __DIR__ . '/includes/toolbar.php';
require __DIR__ . '/includes/footer.php';