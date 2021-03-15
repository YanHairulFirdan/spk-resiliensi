<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $fillable = ['aspect_id', 'tips', 'tipe'];
    public function aspect()
    {
        return $this->belongsTo(Aspect::class);
    }
}
