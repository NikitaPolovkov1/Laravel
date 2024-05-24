<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceOrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $service_name;
    public $name;
    public $email;
    public $phone;

    /**
     * Create a new message instance.
     *
     * @param  string  $service_name
     * @param  string  $name
     * @param  string  $email
     * @param  string  $phone
     * @return void
     */
    public function __construct($service_name, $name, $email, $phone)
    {
        $this->service_name = $service_name;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.service_order')
            ->subject('Подтверждение заказа услуги')
            ->with([
                'service_name' => $this->service_name,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
    }
}
