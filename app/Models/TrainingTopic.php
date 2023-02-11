<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingTopic extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic',
        'startAt',
        'endAt',
        'trainer',
        'training_id',
        'register',
];
}
