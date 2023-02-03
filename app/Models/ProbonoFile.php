<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProbonoFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'case_title',
        'case_type',
        'case_file',
        'probono_id',
        'register',
    ];
}
