<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideosCourses extends Model
{
    use HasFactory;


    protected  $fillable=['courses_id','src'];


    /*         Courses        */

    public function course()
    {
        return $this->belongsTo(Courses::class)->withDefault();
    }

}
