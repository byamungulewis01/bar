<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probono_dev extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'title',
        'narration',
        'attach_file',
        'probono_id',
    ];
}
