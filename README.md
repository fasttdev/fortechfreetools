# FastDev Free Tools

Kumpulan tools developer ringan, khusus mobile. PHP + HTML + CSS + JS.
Tema: **Claymorphism + Glassmorphism**, dark dengan aksen biru muda.

## Deploy di Vercel

Project ini pakai runtime komunitas `vercel-php` (PHP 8.5).
Konfigurasi sudah ada di `vercel.json`.

### Cara deploy

1. Push semua file ke repo GitHub/GitLab/Bitbucket.
2. Import repo di dashboard Vercel.
3. Framework preset: **Other** (biarkan default).
4. Build command: kosong.
5. Output directory: kosong.
6. Klik **Deploy**.

Atau lewat CLI:

```bash
npm i -g vercel
vercel --prod