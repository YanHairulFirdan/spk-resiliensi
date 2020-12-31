<?php

namespace App\Imports;

use App\Statement;
use Maatwebsite\Excel\Concerns\ToModel;

class StatementImport implements ToModel
{
    /**
     * @param array @$row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // $statement = new Statement([
        //     'aspect_id' => $row['aspect_id'],
        //     'statement' => $row['statement'],
        //     'type' => $row['type']
        // ]);
        // dd($statement);
        return new Statement([
            'aspect_id' => (int)$row[1],
            'statement' =>  $row[2],
            'type' => $row[3],
        ]);
    }
}
