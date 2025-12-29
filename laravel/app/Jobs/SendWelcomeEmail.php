<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use SerializesModel;
    use Queueable;


    public string $email;

    public $tries = 3;
    public $timeout = 30;

    /**
     * Create a new job instance.
     */
    public function __construct(string $email;)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::raw(
            'Welcome!!! this is message sender across queue 🚀🚀🚀',
            function ($message) {
                $message->to($this->email)
                        ->subject('Welcome!');
            }
 
        );
    }
}
