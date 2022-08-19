<?php

namespace App\Models;

use App\Models\User;
use App\Models\Year;
use App\Models\Examtype;
use App\Models\StudentClass;
use App\Models\Assignsubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Markentry extends Model
{
    use HasFactory;
    protected $fillable = ['id'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function assign_subject()
    {
        return $this->belongsTo(Assignsubject::class, 'assign_subject_id', 'id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    public function exam_type()
    {
        return $this->belongsTo(Examtype::class, 'exam_type_id', 'id');
    }
}