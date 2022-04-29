<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConvocationLetter extends Mailable
{
    use Queueable, SerializesModels;

    public $convocation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($convocation)
    {
        $this-> convocation = $convocation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@insti.bj', 'Lettre de convocation')
                ->view('gestion_conseils_plaintes.vue_convocation')
                // ->with([
                //     'orderName' => $this->convocation->id,
                //     //'orderPrice' => $this->order->price,
                // ])
                ;
    }
}
