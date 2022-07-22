<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignsubject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function get_subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function get_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
}