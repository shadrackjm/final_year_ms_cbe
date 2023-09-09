<?php

namespace App\Exports;

use App\Models\Supervisor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SupervisorExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Supervisor::select('id','firstname','middlename','lastname','email','phone','created_at')->get();
    }
    public function headings(): array
    {
        return ['ID', 'firstname','middlename','lastname','email','phone','created_at'];
    }
}
