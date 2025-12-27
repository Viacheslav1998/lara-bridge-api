<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use SerializesModel;
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user)->send(new WelcomeEmail());
    }
}
