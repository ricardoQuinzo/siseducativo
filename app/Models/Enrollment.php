<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'course_id', 'is_active'];

    public function student()
    {
        return $this->belongsTo(Application::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
