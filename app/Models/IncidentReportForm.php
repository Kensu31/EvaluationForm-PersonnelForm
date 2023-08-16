<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentReportForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'report_date'
    ];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function incidentReportFormAnswer(){
        return $this->hasOne(IncidentReportFormAnswer::class);
    }
}
