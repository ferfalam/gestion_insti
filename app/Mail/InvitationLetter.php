<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationLetter extends Mailable
{
    use Queueable, SerializesModels;
       /**
     * The order instance.
     *
     * @var \App\Models\Convocation
     */

    public $convocation;
    /**
     * Create a new message instance.
     * @param  \App\Models\Convication  $convocation
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
        return $this->from('instilokossa@gmail.com', 'Lettre d\'invitation')
                ->view('gestion_conseils_plaintes.mails.invitation')
                ->with([
                     'tile' => $this->convocation,
                //     //'orderPrice' => $this->order->price,
                 ])
                ;
    }
}
