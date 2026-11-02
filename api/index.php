<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/icons.php';
require_once __DIR__ . '/includes/tools-registry.php';

$pageTitle   = APP_NAME;
$activePage  = 'tools1';
$pageHeading = APP_SHORT;
$pageSub     = 'Free Tools';
$showStatus  = true;

require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>

<main class="app__main">
    <section class="hero clay" data-stagger>
        <div class="hero__glow" aria-hidden="true"></div>
        <span class="hero__pill glass">v<?= e(APP_VERSION) ?> · Beta</span>
        <h2 class="hero__title">Kumpulan tools developer, gratis &amp; ringan.</h2>
        <p class="hero__desc">Dibuat khusus buat HP. Nggak ada iklan, nggak perlu daftar.</p>
        <div class="hero__stats">
            <div class="stat glass">
                <span class="stat__value">0</span>
                <span class="stat__label">Tools Aktif</span>
            </div>
            <div class="stat glass">
                <span class="stat__value">100%</span>
                <span class="stat__label">Gratis</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section__head">
            <h3 class="section__title">Tools</h3>
            <span class="section__tag glass">Coming Soon</span>
        </div>

        <div class="grid">
            <?php foreach ($TOOLS_T1 as $tool): ?>
                <?php $locked = empty($tool['ready']); ?>
                <article class="tool-card clay<?= $locked ? ' is-locked' : '' ?>" data-stagger>
                    <div class="tool-card__icon">
                        <?= icon($tool['icon']) ?>
                    </div>
                    <h4 class="tool-card__title"><?= e($tool['title']) ?></h4>
                    <p class="tool-card__desc"><?= e($tool['desc']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php
require __DIR__ . '/includes/toolbar.php';
require __DIR__ . '/includes/footer.php';