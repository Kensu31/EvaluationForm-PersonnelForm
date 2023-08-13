<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationFormAnswer extends Model
{
    use HasFactory;
    protected $fillable =[
        'Quality_Work',
        'Attendance_Punctuality',
        'Reliability',
        'Communication',
        'Judgment',
        'Initiative',
        'Knowledge',
        'Training',
        'Performance',
        'Commnents',
    ];

    public function evaluationForm(){
        return $this->belongsTo(EvaluationForm::class);
    }
}
