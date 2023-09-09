<?php

namespace App\Imports;

use App\Models\GroupData;
use App\Models\Group;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GroupDataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $update_students = Student::where('regno','=',$row['regno'])->update([
            'has_group' => 1,
          ]); 

         return new GroupData([
             'group_id' => $row['group_id'],
             'regno' => $row['regno'],
         ]);

    }
}
