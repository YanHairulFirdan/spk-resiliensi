<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspect extends Model
{
    protected $fillable = ['aspect', 'strength_suggestion', 'weak_suggestion'];
    public function statements()
    {
        return $this->hasMany(Statement::class);
    }
    public function tips()
    {
        return $this->hasMany(Tip::class);
    }
}
