<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    //

    public function aspect()
    {
        return $this->belongsTo(Aspect::class);
    }
}
