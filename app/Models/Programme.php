<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{


    public function department(){
        return $this->belongsTo(Department::class);
    }

     public function students(){
        return $this->hasMany(User::class)->where('user_type','student');
    }
}
