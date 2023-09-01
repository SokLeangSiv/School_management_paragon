<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stu_class extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student(){
        return $this->hasMany(Student::class , 'class_id' , 'id');
    }

    public function exam(){
        return $this->hasMany(Exam::class , 'class_id' , 'id');
    }

   
}
