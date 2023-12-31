<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelForm extends Model
{
    protected $fillable = [
        'date_prepared',
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
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}