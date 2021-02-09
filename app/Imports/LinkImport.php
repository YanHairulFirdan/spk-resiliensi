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
        $aspects = [
            '',
            'regulasi emosi',
            'pengendalian impuls',
            'optimisme',
            'self efficacy',
            'analisis kausal',
            'empati',
            'reaching out',
        ];
        return new Link([
            'aspect_id' => (int) array_search($row[1], $aspects),
            'link' => $row[2],
            'judul' => $row[3]
        ]);
    }
}
