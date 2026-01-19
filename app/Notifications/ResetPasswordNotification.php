<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

class ResetPasswordNotification extends ResetPassword implements ShouldQueue
{
    use Queueable;

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $url = route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);

        return (new MailMessage)
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('Informasi Pembaruan Kata Sandi - ' . config('app.name'))
            ->greeting('Halo ' . $notifiable->name . '!')
            ->line('Kami menerima permintaan untuk mereset kata sandi akun Anda di ' . config('app.name') . '.')
            ->line('Silakan klik tombol di bawah ini untuk melanjutkan proses pembaruan kata sandi.')
            ->action('Reset Kata Sandi', $url)
            ->line('Link ini akan kedaluwarsa dalam ' . config('auth.passwords.' . config('auth.defaults.passwords') . '.expire') . ' menit.')
            ->line('Jika Anda tidak merasa melakukan permintaan ini, abaikan email ini dengan aman.')
            ->salutation('Salam hangat,' . PHP_EOL . 'Tim ' . config('app.name'));
    }
}
