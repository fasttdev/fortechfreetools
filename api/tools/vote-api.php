<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');

$raw   = file_get_contents('php://input');
$input = json_decode($raw ?: '[]', true) ?: [];

$url   = trim((string)($input['url']   ?? ''));
$pesan = trim((string)($input['pesan'] ?? ''));

if ($url === '' || $pesan === '') {
    http_response_code(400);
    echo json_encode(['status' => false, 'error' => 'URL & pesan wajib diisi']);
    exit;
}

if (mb_strlen($pesan) > 100) {
    http_response_code(400);
    echo json_encode(['status' => false, 'error' => 'Pesan terlalu panjang (max 100)']);
    exit;
}

if (!preg_match('#^https?://(www\.)?whatsapp\.com/channel/#i', $url)) {
    http_response_code(400);
    echo json_encode(['status' => false, 'error' => 'URL harus berupa link channel WhatsApp']);
    exit;
}

$payload = json_encode(['url' => $url, 'pesan' => $pesan], JSON_UNESCAPED_SLASHES);

$ch = curl_init('https://pollchbyjiyyad-21.vercel.app/api/vote');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $payload,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_MAXREDIRS      => 2,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'Accept: application/json, text/plain, */*',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
        'Origin: https://pollchbyjiyyad-21.vercel.app',
        'Referer: https://pollchbyjiyyad-21.vercel.app/',
    ],
]);

$body = curl_exec($ch);
$code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
$err  = curl_error($ch);
curl_close($ch);

if ($body === false || $err !== '') {
    http_response_code(502);
    echo json_encode(['status' => false, 'error' => 'Gagal konek ke server: ' . ($err ?: 'unknown')]);
    exit;
}

$decoded = json_decode($body, true);

http_response_code($code > 0 ? $code : 200);

if (is_array($decoded)) {
    echo json_encode($decoded, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

echo json_encode([
    'status' => false,
    'error'  => 'Respons tidak valid dari server',
    'raw'    => mb_substr((string)$body, 0, 300),
]);