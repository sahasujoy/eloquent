<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function getCompany()
    {
        return $this->hasOne('App\Models\Company');
    }

    public function getDevice()
    {
        return $this->hasMany('App\Models\Device');
    }
}
