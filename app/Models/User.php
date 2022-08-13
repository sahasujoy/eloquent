<?php

namespace App\Models;



use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function phone()
    {
        return $this->hasOne('App\Models\Phone');
    }

    public function device()
    {
        return $this->hasMany('App\Models\device', 'member_id');
    }

    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }

    public function image()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function friend()
    {
        return $this->hasMany('App\Models\Friend');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }
}
