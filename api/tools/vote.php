<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/icons.php';

$pageTitle   = 'Vote WA · ' . APP_NAME;
$activePage  = 'tools1';
$pageHeading = 'Vote WA';
$pageSub     = 'Channel Vote';
$showStatus  = false;

require __DIR__ . '/../includes/head.php';
require __DIR__ . '/../includes/header.php';
?>

<main class="app__main">
    <section class="voter clay" data-stagger>
        <div class="voter__head">
            <div class="tool-card__icon"><?= icon('vote') ?></div>
            <div>
                <h2 class="voter__title">WhatsApp Vote</h2>
                <p class="voter__desc">Kirim vote ke poll di channel WhatsApp.</p>
            </div>
        </div>

        <form id="vote-form" class="voter__form" novalidate>
            <label class="field">
                <span class="field__label">URL Postingan</span>
                <input
                    type="url"
                    id="vote-url"
                    class="field__input"
                    placeholder="https://whatsapp.com/channel/xxx/100"
                    required
                    autocomplete="off"
                    autocapitalize="off"
                    spellcheck="false"
                />
            </label>

            <label class="field">
                <span class="field__label">Pesan Vote</span>
                <input
                    type="text"
                    id="vote-pesan"
                    class="field__input"
                    placeholder="vote"
                    maxlength="100"
                    required
                    autocomplete="off"
                />
            </label>

            <button type="submit" id="vote-submit" class="voter__submit clay">
                <span>Kirim Vote</span>
            </button>
        </form>

        <div id="vote-result" class="voter__result" hidden></div>
    </section>
</main>

<script>
(function () {
    'use strict';

    const form  = document.getElementById('vote-form');
    const urlIn = document.getElementById('vote-url');
    const pesIn = document.getElementById('vote-pesan');
    const btn   = document.getElementById('vote-submit');
    const out   = document.getElementById('vote-result');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const url   = urlIn.value.trim();
        const pesan = pesIn.value.trim();

        if (!url || !pesan) {
            render({ status: false, error: 'URL & pesan wajib diisi' });
            return;
        }

        btn.disabled = true;
        btn.querySelector('span').textContent = 'Mengirim...';
        out.hidden = true;

        try {
            const res = await fetch('/api/tools/vote-api.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ url, pesan })
            });
            const data = await res.json();
            render(data);
        } catch (err) {
            render({ status: false, error: 'Gagal konek: ' + err.message });
        } finally {
            btn.disabled = false;
            btn.querySelector('span').textContent = 'Kirim Vote';
        }
    });

    function render(data) {
        out.hidden = false;

        if (data && data.status === true) {
            const r = data.result || {};
            out.className = 'voter__result is-success';
            out.innerHTML =
                '<div class="voter__result-title">Berhasil</div>'
                + row('Channel', r.channel)
                + row('Post',    r.post)
                + row('Sukses',  r.success)
                + row('Gagal',   r.failed)
                + row('Total',   r.total)
                + (r.message ? '<div class="voter__result-msg">' + esc(r.message) + '</div>' : '');
        } else {
            out.className = 'voter__result is-error';
            out.innerHTML =
                '<div class="voter__result-title">Gagal</div>'
                + '<div class="voter__result-msg">'
                + esc(data && (data.error || data.message) || 'Tidak diketahui')
                + '</div>';
        }
    }

    function row(label, value) {
        return '<div class="voter__row"><span>' + esc(label) + '</span><b>'
            + esc(value === undefined || value === null ? '-' : value)
            + '</b></div>';
    }

    function esc(s) {
        if (s === null || s === undefined) return '-';
        const d = document.createElement('div');
        d.textContent = String(s);
        return d.innerHTML;
    }
})();
</script>

<?php
require __DIR__ . '/../includes/toolbar.php';
require __DIR__ . '/../includes/footer.php';