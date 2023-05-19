<?php

namespace App\Models\Exam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected  $guarded=[];


    public function exam(){

        return $this->belongsTo(Exams::class,'exam_id','id');
    }


}
