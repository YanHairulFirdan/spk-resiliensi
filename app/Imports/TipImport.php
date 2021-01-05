<?php

namespace App\Imports;

use App\Tip;
use Maatwebsite\Excel\Concerns\ToModel;

class TipImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Tip([
            'aspect_id' => (int)$row[1],
            'tips' => $row[2],
        ]);
    }
}
