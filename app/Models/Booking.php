<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'training',
        'advocate',
        'confirm',
];
public function trains()
{
    return $this->belongsTo(Training::class,'training','id');
}
public function user()
{
    return $this->belongsTo(User::class,'advocate','id');
}
}
