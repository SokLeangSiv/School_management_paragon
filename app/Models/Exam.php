<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function class(){
    //     return $this->belongsTo(stu_class::class,'class_id','id');
    // }

    // public function teacher(){
    //     return $this->belongsTo(stu_class::class,'teacher_id','id');
    // }

  
}
