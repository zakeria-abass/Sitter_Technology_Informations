<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable=['name_ar','name_en','about_ar','about_en','student_ar','student_en','url','imge','progr_lang','attachment','download'];


}
