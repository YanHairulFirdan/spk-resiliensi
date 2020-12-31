<?php

namespace App\Exports;

use App\Answear;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnswearExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return ['nama', 'kelas', 'jawaban 1', 'jawaban 2', 'jawaban 3', 'jawaban 4', 'jawaban 5', 'jawaban 6', 'jawaban 7'];
    }
    public function collection()
    {
        $data = DB::table('users')->join('answears', 'users.id', '=', 'answears.user_id')
            ->select('users.name', 'users.class', 'answears.answear_1', 'answears.answear_2', 'answears.answear_3', 'answears.answear_4', 'answears.answear_5', 'answears.answear_6', 'answears.answear_7')->get();
        return $data;
    }
}
