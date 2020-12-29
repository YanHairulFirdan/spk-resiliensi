<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    public function aspect()
    {
        return $this->belongsToMany(Aspect::class);
    }
}
