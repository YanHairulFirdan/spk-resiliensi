<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answear extends Model
{
    protected $fillable = ['user_id', 'answear_1', 'answear_2', 'answear_3', 'answear_4', 'answear_5', 'answear_6'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
