<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingMaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'file',
        'training_id',
        'register',
];
}

