<?php

namespace App\Models\Lectures;

use App\Models\Courses\Courses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function cours()
    {
        return $this->belongsTo(Courses::class);
    }
}
