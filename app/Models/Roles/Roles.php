<?php

namespace App\Models\Roles;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function abilites(){

        return $this->belongsToMany(Ability::class,'abilit_role','role_id','abilitie_id');
    }


    public  function user(){

        return $this->hasOne(User::class,'role_id')->withDefault();
    }
}
