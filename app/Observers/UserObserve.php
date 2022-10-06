<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

class UserObserve
{
    private $user;

    public function creating( User &$model )
    {
        $this->user = &$model;

        $this->user->createNewToken();

        if (is_null($this->user->api_token)) return false;

    }

}
