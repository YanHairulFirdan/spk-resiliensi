<?php

namespace App\Imports;

use App\Aspect;
use Maatwebsite\Excel\Concerns\ToModel;

class AspectImpor implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Aspect([]);
    }
}
