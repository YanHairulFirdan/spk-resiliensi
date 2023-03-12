<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    protected $hidden = [
        'id',
        'user_id',
        'created_at',
        'updated_at',
        'final_score',
    ];

    protected $table = 'scores';
    protected $fillable = [
        'user_id',
        'aspect_id',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aspect()
    {
        return $this->belongsTo(Aspect::class);
    }
}
