<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "username","nama","role_id",
        "password","alamat","tempat_lahir",
        "tanggal_lahir","photo_profile"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student() {
        return $this->hasOne(Student::class, 'user_id');
    }

    public function admin() {
        return $this->hasOne(Admin::class,'user_id');
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class,'user_id');
    }

    public function finance() {
        return $this->belongsTo(Finance::class,'user_id');
    }
}
