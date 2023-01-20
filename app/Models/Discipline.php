<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discipline extends Model
{
    use HasFactory;
    protected $table = 'table_discipline_cases';
    protected $fillable = [
        'case_number',
        'complaint',
        'sammary',
        'name',
        'email',
        'phone',
        'advcate_id',
        'status',
        'case_type',
        'createdby',
    ];
public function user()
{
    return $this->belongsTo(User::class,'advcate_id','id');
}
   
}
