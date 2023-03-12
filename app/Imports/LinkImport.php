<?php

namespace App\Imports;

use App\Aspect;
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
        $aspect = Aspect::query()->firstWhere('aspect', strtolower($row[0]));

        if ($aspect) {
            return new Link([
                'aspect_id' => $aspect->id,
                'link' => $row[1],
                'judul' => $row[2],
            ]);
        }
        
        return null;
    }
}
