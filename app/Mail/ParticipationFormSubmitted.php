<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Project;

class ParticipationFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $project;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @param \App\Models\Project $project
     * @return void
     */
    public function __construct(array $data, Project $project)
    {
        $this->data = $data;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.participation_form-submitted')
            ->subject('New Participation Form Submission');
    }
}
