<?php
/**
 * Partial: toolbar bottom.
 * Variabel: $NAV_PAGES (global), $activePage
 */
?>
<nav class="toolbar glass" aria-label="Navigasi utama">
    <?php foreach ($NAV_PAGES as $key => $nav): ?>
        <a href="<?= e($nav['url']) ?>"
           class="toolbar__item<?= active_class($key, $activePage) ?>"<?= aria_current($key, $activePage) ?>>
            <?= icon($nav['icon']) ?>
            <span><?= e($nav['label']) ?></span>
        </a>
    <?php endforeach; ?>
</nav>