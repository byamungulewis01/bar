<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probono extends Model
{
    use HasFactory;
    protected $table = 'probono';
    protected $fillable = [
        'referral_name',
        'referral_mobile',
        'referral_gender',
        'referral_case_no',
        'case_nature',
        'hearing_date',
        'category',
        'register',
        'case_status',
    ];

}
