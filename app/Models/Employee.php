<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
        return $this->hasMany(PositionMovement::class);
    }

    public function regularizations()
    {
        return $this->hasMany(Regularization::class);
    }

    public function salaryAdjustments()
    {
        return $this->hasMany(SalaryAdjustment::class);
    }

    public function benefitAdjustments()
    {
        return $this->hasMany(BenefitAdjustment::class);
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