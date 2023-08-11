<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryAdjustment extends Model
{
    protected $fillable = [
        'reason_for_upgrade',
        'effective_date',
        'basic_salary_from',
        'basic_salary_to',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}