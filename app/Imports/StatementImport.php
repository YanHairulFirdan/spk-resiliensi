<?php

namespace App\Imports;

use App\Statement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StatementImport implements ToModel, WithHeadingRow
{
    /**
     * @param array @$row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $aspects = [
            "regulasi emosi",
            "pengendalian impuls",
            "optimisme",
            "percaya diri",
            "analisis kausal",
            "empati",
            "reaching out"
        ];
        // dd($row);
        return new Statement([
            'statement' =>  $row['statement'],
            'aspect_id' => (int)array_search($row['aspek'], $aspects) + 1,
            'type' => (string)$row['type'],
        ]);
    }
}
