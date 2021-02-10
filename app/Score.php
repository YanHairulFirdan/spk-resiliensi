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
        'regulasi_emosi',
        'pengendalian_impuls',
        'optimis',
        'percaya_diri',
        'analisis_kausal',
        'empati',
        'reaching_out',
        'final_score',
    ];
}
