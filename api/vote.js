module.exports = async function handler(req, res) {
  if (req.method !== 'POST') {
    res.status(405).json({ status: false, error: 'Method not allowed' });
    return;
  }

  const body  = req.body || {};
  const url   = String(body.url   || '').trim();
  const pesan = String(body.pesan || '').trim();

  if (!url || !pesan) {
    res.status(400).json({ status: false, error: 'URL & pesan wajib diisi' });
    return;
  }

  if (pesan.length > 100) {
    res.status(400).json({ status: false, error: 'Pesan terlalu panjang (max 100)' });
    return;
  }

  if (!/^https?:\/\/(www\.)?whatsapp\.com\/channel\//i.test(url)) {
    res.status(400).json({ status: false, error: 'URL harus berupa link channel WhatsApp' });
    return;
  }

  const controller = new AbortController();
  const timeoutId  = setTimeout(() => controller.abort(), 25000);

  try {
    const response = await fetch('https://pollchbyjiyyad-21.vercel.app/api/vote', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json, text/plain, */*',
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
        'Origin': 'https://pollchbyjiyyad-21.vercel.app',
        'Referer': 'https://pollchbyjiyyad-21.vercel.app/'
      },
      body: JSON.stringify({ url, pesan }),
      signal: controller.signal
    });

    const text = await response.text();
    let data;

    try {
      data = JSON.parse(text);
    } catch {
      data = {
        status: false,
        error: 'Respons tidak valid dari server',
        raw: text.slice(0, 300)
      };
    }

    res.status(response.status).json(data);
  } catch (err) {
    const msg = err && err.name === 'AbortError'
      ? 'Timeout (server terlalu lama merespons)'
      : 'Gagal konek ke server: ' + (err && err.message ? err.message : 'unknown');
    res.status(502).json({ status: false, error: msg });
  } finally {
    clearTimeout(timeoutId);
  }
};