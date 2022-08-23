<?php

namespace App\Models;

use App\Models\User;
use App\Models\Year;
use App\Models\Group;
use App\Models\Shift;
use App\Models\Discount;
use App\Models\Feecategory;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Studentfee extends Model
{
    use HasFactory;


    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'id', 'assign_student_id');
    }


    public function class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }


    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }


    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }


    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }

    public function fee_category()
    {
        return $this->belongsTo(Feecategory::class, 'fee_category_id', 'id');
    }
}