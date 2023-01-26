<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DisciplineSitting extends Model
{
    use HasFactory;
    protected $fillable = [
               'sitting_id',
                'category',
                'sittingDay',
                'sittingTime',
                'sittingVenue',
                'discipline_case',
                'decisionCategory',
                'targetedAdvocate',
                'comment',
                'scheduledBy',
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class,'scheduledBy','id');
    }
}
