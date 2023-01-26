<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discipline extends Model
{
    use HasFactory;
    protected $table = 'discipline';
    protected $fillable = [
        'p_name',
        'p_email',
        'p_phone',
        'p_advocate',
        'd_name',
        'd_email',
        'd_phone',
        'd_advocate',
        'case_number',
        'case_type',
        'sammary',
        'complaint',
        'case_status',
        'authority',
        'register',
    ];

public function admin()
{
    return $this->belongsTo(Admin::class,'register','id');
}
   
}
