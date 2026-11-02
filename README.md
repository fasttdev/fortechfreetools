# FastDev Free Tools

Kumpulan tools developer ringan, khusus mobile. PHP + HTML + CSS + JS.
Tema: **Claymorphism + Glassmorphism**, dark dengan aksen biru muda.

## Struktur

- `index.php` — halaman Tools 1 (landing)
- `tools2.php` — halaman Tools 2 (maintenance)
- `build.php` — halaman Build (maintenance)
- `info.php` — halaman Info (maintenance)
- `includes/` — partial & config
- `assets/` — css & js

## Menambah tools baru

1. Tambah entry di `includes/tools-registry.php`.
2. Siapkan ikon SVG baru di `includes/icons.php` (kalau belum ada).
3. Buat halaman tool-nya (misal `tools/json.php`), lalu set `href` di registry.
4. Set `ready => true` di registry.

## Menambah halaman navigasi baru

Tambah entry di `$NAV_PAGES` pada `includes/config.php` + buat file halamannya.

## Jalankan lokal

```bash
php -S localhost:8000