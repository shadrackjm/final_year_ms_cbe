<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = new User;
        $user->username = $row['regno'];
        $user->fname = $row['fname'];
        $user->Mname = $row['mname'];
        $user->lname = $row['lname'];
        $user->email = $row['email'];
        $user->is_admin = 0;
        $user->password = Hash::make('123456');
        $user->save();

        return new Student([
            'regno' => $row['regno'],
            'fname' => $row['fname'],
            'mname' => $row['mname'],
            'lname' => $row['lname'],
            'level' => $row['level'],
            'email' => $row['email'],
            'phone' => $row['phone'],
        ]);
    }
}
