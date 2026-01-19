<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

$to = 'ryanotaku1@live.com'; // Menggunakan email user yang terlihat di dump sebelumnya (Juan) atau input user
// Better to just pick the first user or hardcode a safe one?
// Let's use a generic instruction in the output.
// user email from prev conversation: ryanotaku1@live.com

$target = 'ryanotaku1@live.com';

echo "Current Mail Config:\n";
echo "Transport: " . Config::get('mail.mailers.resend.transport') . "\n";
echo "API Key: " . (Config::get('services.resend.key') ? 'Set (Hidden)' : 'Not Set') . "\n";
echo "From: " . Config::get('mail.from.address') . "\n";
echo "Queue Connection: " . Config::get('queue.default') . "\n";

echo "\nSending synchronous test email to $target...\n";

try {
    Mail::raw('Halo, ini adalah tes email manual dari script debugging Tirtabhumi. Jika Anda menerima ini, berarti konfigurasi Resend sudah benar.', function ($message) use ($target) {
        $message->to($target)
            ->subject('Tes Konfigurasi Resend - Tirtabhumi');
    });
    echo "Email berhasil dikirim (Sync)!\nSilakan cek inbox/spam $target.\n";
} catch (\Exception $e) {
    echo "GAGAL mengirim email: " . $e->getMessage() . "\n";
}
