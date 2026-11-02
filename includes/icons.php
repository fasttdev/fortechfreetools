<?php
declare(strict_types=1);

/**
 * Kumpulan ikon SVG inline (stroke-based).
 * Pakai: <?= icon('grid') ?>
 */
function icon(string $name, float $stroke = 2.0, string $class = ''): string
{
    $paths = [
        'grid'   => '<rect x="3" y="3" width="7" height="7" rx="1.5"/>'
                  . '<rect x="14" y="3" width="7" height="7" rx="1.5"/>'
                  . '<rect x="3" y="14" width="7" height="7" rx="1.5"/>'
                  . '<rect x="14" y="14" width="7" height="7" rx="1.5"/>',

        'layers' => '<path d="M12 2 2 7l10 5 10-5-10-5z"/>'
                  . '<path d="m2 17 10 5 10-5"/>'
                  . '<path d="m2 12 10 5 10-5"/>',

        'wrench' => '<path d="m15 12-8.5 8.5a2.12 2.12 0 1 1-3-3L12 9"/>'
                  . '<path d="M17.64 15 22 10.64"/>'
                  . '<path d="m20.91 11.7-1.25-1.25c-.6-.6-.93-1.4-.93-2.25v-.86L16.01 4.6a5.56 5.56 0 0 0-3.94-1.64H9l.92.82A6.18 6.18 0 0 1 12 8.4v1.56l2 2h2.47l2.26 1.91"/>',

        'info'   => '<circle cx="12" cy="12" r="10"/>'
                  . '<path d="M12 16v-4"/>'
                  . '<path d="M12 8h.01"/>',

        'back'   => '<path d="m15 18-6-6 6-6"/>',

        /* --- ikon tools (dipakai di registry) --- */
        'json'   => '<path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/>',
        'base64' => '<rect x="3" y="3" width="18" height="18" rx="3"/>'
                  . '<path d="M3 9h18"/><path d="M9 21V9"/>',
        'color'  => '<circle cx="13.5" cy="6.5" r="2.5"/>'
                  . '<circle cx="19" cy="13" r="2.5"/>'
                  . '<circle cx="6" cy="12" r="2.5"/>'
                  . '<circle cx="10" cy="19" r="2.5"/>',
        'hash'   => '<path d="M4 4h16v6H4z"/><path d="M4 14h10v6H4z"/>'
                  . '<path d="M18 14h2v6h-2z"/>',
        'url'    => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>'
                  . '<path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>',
        'md'     => '<path d="M12 20h9"/>'
                  . '<path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/>',
    ];

    $body = $paths[$name] ?? '';

    $cls = $class !== '' ? ' class="' . e($class) . '"' : '';

    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"'
         . ' stroke-width="' . e((string) $stroke) . '"'
         . ' stroke-linecap="round" stroke-linejoin="round"' . $cls . '>'
         . $body . '</svg>';
}