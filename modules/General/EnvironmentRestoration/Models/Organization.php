<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    //protected $table = "Organizations";

    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function environment_restorations(){
        return $this->hasMany('App\Models\Environment_Restoration');
    }
}
