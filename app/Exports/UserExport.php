<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return ['nama', 'username', 'kelas', 'nomor telepon'];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::query()
            ->select('name', 'username', 'class', 'phoneNumber')
            ->where('role', '=', '')
            ->orWhere('role', '=', null)
            ->get();
    }
}
