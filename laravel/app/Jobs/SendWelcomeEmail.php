<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
// use example model

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 30;

    public function backoff(): array
    {
        return [30, 120, 300];
    }

    public function __construct(
        public string $email
    ) {}

    public function handle(): void
    {
        Mail::raw(
            'Welcome!!! this is message sender across queue 🚀',
            function ($message) {
                $message->to($this->email)
                        ->subject('Welcome!');
            }
        );
    }
}
