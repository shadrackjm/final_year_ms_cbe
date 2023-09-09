<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
      'regno',
      'fname',
      'mname',
      'lname',
      'level',
      'email',
      'phone',
    ];
}
