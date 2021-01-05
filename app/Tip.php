<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $fillable = ['aspect_id', 'tips'];
    public function aspect()
    {
        return $this->belongsTo(Aspect::class);
    }
}
