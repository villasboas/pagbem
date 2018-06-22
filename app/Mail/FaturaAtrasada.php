<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FaturaAtrasada extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Dados da view
     *
     * @var array
     */
    public $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('@emails.fatura-atrasada', $this->data);
    }
}

// End of file
