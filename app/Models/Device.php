<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = "devices";

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'member_id');
    }
}
