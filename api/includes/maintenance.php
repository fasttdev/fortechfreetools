<?php
/**
 * Partial: kartu maintenance.
 * Variabel: $maintIcon, $maintDesc
 */
?>
<main class="app__main maintenance">
    <div class="maint-card clay" data-stagger>
        <div class="maint-icon glass">
            <?= icon($maintIcon ?? 'info', 1.8) ?>
        </div>
        <h2 class="maint-title">Under Maintenance</h2>
        <p class="maint-desc"><?= e($maintDesc ?? 'Halaman ini sedang disiapkan.') ?></p>

        <div class="maint-progress">
            <div class="maint-progress__bar"></div>
        </div>

        <a href="/" class="maint-btn clay">
            <?= icon('back') ?>
            <span>Kembali ke Tools 1</span>
        </a>
    </div>
</main>