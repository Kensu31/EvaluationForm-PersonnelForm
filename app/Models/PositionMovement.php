<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionMovement extends Model
{
    protected $fillable = [
        'reason_for_upgrade',
        'effective_date',
        'job_title_from',
        'job_title_to',
        'job_level_from',
        'job_level_to',
        'department_from',
        'department_to',
        'supervisor_from',
        'supervisor_to',
        'employment_status_from',
        'employment_status_to',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}