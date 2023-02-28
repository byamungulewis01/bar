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
        'attendanceDay',
        'cumulatedCredit',
        'voucherNumber',
        'booked',
        'confirm',
        'status',
        'yearInBar',
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
