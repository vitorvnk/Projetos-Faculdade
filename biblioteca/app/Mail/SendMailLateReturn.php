<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\RentedBook;

class SendMailLateReturn extends Mailable
{
    use Queueable, SerializesModels;
    public $rentedbook;
    public $returndate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RentedBook $rentedbook)
    {
        $this->rentedbook = $rentedbook;
        $this->returndate = $rentedbook->return_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.latereturn')->subject('Devolução de Livro');
    }
}
