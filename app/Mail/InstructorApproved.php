<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InstructorApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        // Inject the user object to pass to the email view
        $this->user = $user;
    }

    public function build()
    {
        // Build the email with a subject and a view
        return $this->subject('Your Instructor Request Has Been Approved')
                    ->view('emails.instructor_approval')
                    ->with(['user' => $this->user]);
    }
}
