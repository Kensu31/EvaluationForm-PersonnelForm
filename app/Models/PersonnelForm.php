<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelForm extends Model
{
    protected $fillable = [
        'employee_number',
        'date_prepared',
        'first_name',
        'last_name',
        'date_hired',
    ];

    public function positionMovements()
    {
        return $this->hasOne(PositionMovement::class);
    }

    public function salaryAdjustments()
    {
        return $this->hasOne(SalaryAdjustment::class);
    }

    public function benefitAdjustments()
    {
        return $this->hasOne(BenefitAdjustment::class);
    }

    public function generalRemarks()
    {
        return $this->hasOne(GeneralRemark::class);
    }

    public function approvals()
    {
        return $this->hasOne(Approval::class);
    }
}