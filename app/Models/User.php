<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes, Notifiable, HasRoles, AuthenticationLoggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'district',
        'gender',
        'marital',
        'photo',
        'diplome',
        'regNumber',
        'status',
        'practicing',
        'category',
        'date'
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
        'date' => 'date',
    ];

    public function phone()
    {
        return $this->hasMany(Phonenumber::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function laws()
    {
        return $this->hasMany(Lawscategory::class);
    }

    public function socials()
    {
        return $this->hasMany(Social::class);
    }
}
