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
            "self efficiacy",
            "analisis kausal",
            "empati",
            "reaching out"
        ];

        return new Statement([
            'statement' =>  $row['statement'],
            'aspect_id' => (int)array_search(strtolower($row['aspek']), $aspects) + 1,
            'type' => (string)$row['type'],
        ]);
    }
}
