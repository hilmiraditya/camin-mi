<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Penjualan;

class StatusPesanan extends Notification
{
    use Queueable;

    protected $NotifikasiTransaksi;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($NotifikasiTransaksi)
    {
        //
        $this->id_transaksi = $NotifikasiTransaksi[0];
        $this->nama = $NotifikasiTransaksi[1];
        $this->waktu = $NotifikasiTransaksi[2];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id_transaksi' => $this->id_transaksi,
            'nama' => $this->nama,
            'waktu' => $this->waktu
        ];
    }
}
