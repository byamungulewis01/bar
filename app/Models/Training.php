<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
            'title',
            'category',
            'venue',
            'credits',
            'price',
            'starton',
            'endon',
            'early_deadline',
            'late_deadline',
            'rate',
            'seats',
            'confirm',
            'booking',
            'publish',
            'register',
    ];
}
