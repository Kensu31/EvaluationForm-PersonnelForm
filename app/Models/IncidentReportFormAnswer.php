<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentReportFormAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'incident_date',
        'incident_time',
        'incident_details',
        'cause',
        'recommendation',
        'reportedby',
        'position',
        'department',
        'supervisor',
    ];
    public function incidentReportForm(){
        return $this->belongsTo(IncidentReportForm::class);
    }
}
