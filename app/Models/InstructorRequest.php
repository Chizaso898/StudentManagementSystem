<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorRequest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'expertise', 'additional_info', 'status'];
}
