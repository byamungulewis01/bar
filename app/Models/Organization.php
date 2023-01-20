<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Organization extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticationLoggable,SoftDeletes;
    protected $fillable = [
        'tin',
        'name',
        'type',
        'address',
        'phone',
        'email',
        'password',
        'blocked'
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
}
