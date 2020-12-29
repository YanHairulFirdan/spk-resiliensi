<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    protected $fillable = [
        'user_id',
        'regulasi_emosi',
        'pengendalian_impuls',
        'optimis',
        'percaya_diri',
        'analisis_kausal',
        'empati',
        'reaching_out'
    ];
}
