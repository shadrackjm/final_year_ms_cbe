<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select('id','regno','fname','mname','lname','level','email','phone','created_at')->get();
    }
    public function headings(): array
    {
        return ['S/N', 'Registration number', 'Firstname','Middle name','Last name','Level','Email','Phone','Registration Date'];
    }
}
