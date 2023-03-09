<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributeAdvocate extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'transction_type',
        'reference_no',
        'transction_date',
        'advocate',
        'contribution',
];
}
