<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lawscategory_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laws()
    {
        return $this->belongsTo(Lawscategory::class,'lawscategory_id','id');
    }
}
