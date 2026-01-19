<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;

class VerifyEmailNotification extends VerifyEmail implements ShouldQueue
{
    use Queueable;

    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('Konfirmasi Alamat Email Anda - ' . config('app.name'))
            ->greeting('Halo ' . $notifiable->name . '!')
            ->line('Terima kasih telah bergabung dengan ' . config('app.name') . '.')
            ->line('Silakan klik tombol di bawah ini untuk memverifikasi alamat email Anda dan mengaktifkan akun Anda sepenuhnya.')
            ->action('Verifikasi Email', $verificationUrl)
            ->line('Jika Anda tidak merasa mendaftar di layanan kami, Anda dapat mengabaikan email ini.')
            ->salutation('Salam hangat,' . PHP_EOL . 'Tim ' . config('app.name'));
    }
}
