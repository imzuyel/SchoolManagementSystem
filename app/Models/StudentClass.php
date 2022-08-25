<?php

namespace App\Models;

use App\Models\Assingstudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentClass extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getclass()
    {
        return $this->hasMany(Assingstudent::class, 'class_id', 'id');
    }
}