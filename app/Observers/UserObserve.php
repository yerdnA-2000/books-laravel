<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

class UserObserve
{
    private $user;

    public function created( User &$model )
    {
        /*$this->user = &$model;

        $this->user->createNewApiToken();

        if (is_null($this->user->api_token)) return false;*/

    }

}
