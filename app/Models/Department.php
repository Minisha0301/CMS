<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    public function programmes() {
        return $this->hasMany(Programme::class);
    }

    public function students()
    {
        return $this->hasMany(User::class)->where('user_type', 'student');
    }

    public function staff()
    {
        return $this->hasMany(User::class)->where('user_type', 'staff');
    }


}
