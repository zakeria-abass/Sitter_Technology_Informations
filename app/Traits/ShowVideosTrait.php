<?php

namespace App\Traits;

use App\Models\Courses\Courses;

trait ShowVideosTrait
{

    public   function  view($id){

        $first=Courses::with('videos')->find($id);
        $videos = $first->videos;
       return $videos;
    }

}
