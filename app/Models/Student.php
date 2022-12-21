<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'state',
        'lga',
        'sponsor',
        'date_of_birth',
        'class',
        'img_src',
        'date_enrolled'
    ];
}