<?php

namespace App\Notifications;

use App\Models\Eleve;
use App\Models\Respo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentNotification extends Notification
{
    use Queueable;

    public $amount;
    public $child;
    public $respo;

    public function __construct($amount, $child,$respo)
    {
        $this->amount = $amount;
        $this->child = $child;
        $this->respo = $respo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(): MailMessage
    // {
    //     return (new MailMessage)
    //     ->subject('Payment Received')
    //     ->line('A payment has been received from a parent.')
    //     ->line('Payment Details:')
    //     ->line('Amount: $' . $this->amount)
    //     ->line('Child: ' . $this->child);
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $Eleve = Eleve::findOrfail($this->child);
        $Respo = Respo::findOrfail($this->respo);


        return [
            'Amount' => $this->amount,
            'Respo' => $Respo->Nom,
            'Eleve' => $Eleve->Nom
        ];
    }
}
