<?php
/**
 * Partial: app header (brand + status).
 * Variabel: $pageHeading, $pageSub, $showStatus
 */
?>
<header class="app__header">
    <div class="brand">
        <div class="brand__logo clay">FD</div>
        <div class="brand__text">
            <h1 class="brand__title"><?= e($pageHeading ?? APP_SHORT) ?></h1>
            <p class="brand__sub"><?= e($pageSub ?? APP_NAME) ?></p>
        </div>
    </div>
    <?php if (!empty($showStatus)): ?>
        <div class="status glass">
            <span class="status__dot"></span>
            <span>Online</span>
        </div>
    <?php endif; ?>
</header>