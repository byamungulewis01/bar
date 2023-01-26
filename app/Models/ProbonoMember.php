<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProbonoMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'advocate',
        'probono',
    ];

    public function user()
{
    return $this->belongsTo(User::class,'advocate','id');
}

}
