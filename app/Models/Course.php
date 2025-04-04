<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model {
    use HasFactory;

    protected $fillable = ['name', 'code', 'instructor_id'];

    public function instructor() {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function students() {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'student_id');
    }
}
