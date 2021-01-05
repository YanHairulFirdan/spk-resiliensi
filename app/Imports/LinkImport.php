<?php

namespace App\Imports;

use App\Link;
use Maatwebsite\Excel\Concerns\ToModel;

class LinkImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Link([
            'aspect_id' => (int)$row[1],
            'link' => $row[2]
        ]);
    }
}
