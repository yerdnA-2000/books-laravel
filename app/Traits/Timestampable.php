<?php

namespace App\Traits;

use Carbon\Carbon;

trait Timestampable
{
    public function getCreatedAtAttribute() {;
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('d.m.Y, H:i');
    }

    public function getUpdatedAtAttribute() {;
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('d.m.Y, H:i');
    }
}
