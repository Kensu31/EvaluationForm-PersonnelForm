<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BenefitAdjustment extends Model
{
    protected $fillable = [
        'reason_for_upgrade',
        'effective_date',
        'food_allowance_from',
        'food_allowance_to',
        'vacation_leave_from',
        'vacation_leave_to',
        'sick_leave_from',
        'sick_leave_to',
        'birthday_leave_from',
        'birthday_leave_to',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}