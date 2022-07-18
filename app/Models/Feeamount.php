<?php

namespace App\Models;

use App\Models\Feecategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feeamount extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_feecategory()
    {
        return $this->belongsTo(Feecategory::class, 'fee_category_id', 'id');
    }
    public function get_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
}