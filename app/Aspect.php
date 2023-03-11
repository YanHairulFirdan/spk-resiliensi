<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspect extends Model
{
    protected $fillable = ['aspect', 'descriptions', 'quote'];

    public function statements()
    {
        return $this->hasMany(Statement::class);
    }
    public function tips()
    {
        return $this->hasMany(Tip::class);
    }
    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function getImagePath()
    {
        return asset('images/aspects/' . $this->image);
    }
}
