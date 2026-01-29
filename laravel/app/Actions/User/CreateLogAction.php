<?php

namespace App\Actions\User;

use App\Jobs\SendTestMessage;

class CreateLogAction
{
    public function execute()
    {
        SendTestMessage::dispatch();
    }
}
