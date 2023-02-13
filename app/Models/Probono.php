<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probono extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'gender',
        'age',
        'phone',
        'referral_case_no',
        'jurisdiction',
        'court',
        'case_nature',
        'probono_files',
        'probono_devs',
        'hearing_date',
        'category',
        'referrel',
        'status',
        'advocate',
        'register',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'advocate');
    }
}
