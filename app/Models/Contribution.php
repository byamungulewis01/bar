<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_period',
        'end_period',
        'deadline',
        'amount',
        'percentage',
        'yearInBar',
        'concern',
        'createdBy',
        'updateby',
];
 
}
