<?php

namespace App\Exports;

use App\Models\GroupData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GroupExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $current_year = date('Y');
        return  GroupData::join('students','students.regno','=','group_data.regno')
        ->whereYear('group_data.created_at',$current_year)
        ->orderBy('group_id','ASC')
        ->get(['group_data.group_id','students.fname','students.mname','students.lname','group_data.regno']);
    }
    public function headings(): array
    {
        return ['Group Number', 'Firstname','Middle name','Last name', 'Registration number'];
    }
}
