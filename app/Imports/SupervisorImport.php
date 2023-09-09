<?php

namespace App\Imports;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SupervisorImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      $user = new User;
      $user->username = $row['email'];
      $user->fname = $row['firstname'];
      $user->mname = $row['middlename'];
      $user->lname = $row['lastname'];
      $user->email = $row['email'];
      $user->is_admin = 2;
      $user->password = Hash::make('123456');
      $user->save();

        return new Supervisor([
          'firstname' => $row['firstname'],
          'middlename' => $row['middlename'],
          'lastname' => $row['lastname'],
          'email' => $row['email'],
          'phone' => $row['phone'],
        ]);


    }
}
