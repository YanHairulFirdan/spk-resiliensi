<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspect extends Model
{
    protected $fillable = ['aspect', 'strength_suggestion', 'weak_suggestion'];
}
