<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerFormReportMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $formData;

    /**
     * Create a new message instance.
     *
     * @param  array  $formData
     * @return void
     */
    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Customer Form Report')
                    ->markdown('emails.customer-form-report');
    }
}
