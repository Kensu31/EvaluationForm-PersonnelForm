<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function evaluationForm(){
        return $this->hasMany(EvaluationForm::class);
    }
    public function personnelForm(){
        return $this->hasMany(PersonnelForm::class);
    }
    public function incidentReportForm(){
        return $this->hasMany(IncidentReportForm::class);
    }
}
