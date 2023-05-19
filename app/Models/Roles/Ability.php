<?php

namespace App\Models\Roles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function roles(){

        return $this->belongsToMany(Roles::class,'abilit_role','role_id','abilitie_id');
    }
}
