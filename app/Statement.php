<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    //
    protected $fillable = ['aspect_id', 'statement', 'type'];
    public function aspect()
    {
        return $this->belongsTo(Aspect::class, 'aspect_id');
    }
}
