<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['aspect_id', 'link'];

    public function aspect()
    {
        return $this->belongsTo(Aspect::class);
    }
}
