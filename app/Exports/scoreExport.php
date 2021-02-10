<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class scoreExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return ['nama', 'kelas', 'regulasi emosi',  'pengendalian impuls', 'optimis', 'percaya diri', 'analisis kausal', 'empati', 'reaching out'];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = DB::table('users')->join('scores', 'users.id', '=', 'scores.user_id')
            ->select('users.name', 'users.class', 'scores.regulasi_emosi', 'scores.pengendalian_impuls', 'scores.optimis', 'scores.percaya_diri', 'scores.analisis_kausal', 'scores.empati', 'scores.reaching_out')->get();
        return $data;
    }
}
