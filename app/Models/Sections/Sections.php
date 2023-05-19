<?php

namespace App\Models\Sections;

use App\Models\Courses\Courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;

     protected $fillable=['name_ar','name_en','about_ar','about_en','user_id'];


    /*         User        */
    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }

    /*         Courses        */
    public function course(){

        return $this->hasOne(Courses::class,'section_id','id');
    }
}
