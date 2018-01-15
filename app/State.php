<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function LGA()
    {
        return $this->hasMany(Local_government::class);
    }
}
