<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'dob', 'std_id', 'parent_name', 'parent_contact', 'parent_email', 'parent_relationship'
    ];
}
