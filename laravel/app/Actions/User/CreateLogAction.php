<?php

namespace App\Actions\User;

class CreateLogAction
{
    public function execute(array $data)
    {
        // logic ...  store ...

        sendTestMessage::dispatch();
    }
}
