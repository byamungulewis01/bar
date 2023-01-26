<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DisciplineParticipant extends Model
{
    use HasFactory;
    protected $fillable = [
        'table_id',
        'discipline_case',
        'advocate',
        'role',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'advocate','id');
    }
    public function admin()
    {
        return $this->belongsTo(User::class,'advocate','id');
    }
}
