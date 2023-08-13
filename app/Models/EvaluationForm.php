<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationForm extends Model
{
    use HasFactory;
    protected $fillable=[
        'employee_name',
        'job_title',
        'reviewer',
        'review_period',
        'rating',

    ];
    public function evaluationFormAnswer(){
        return $this->hasOne(EvaluationFormAnswer::class);
    }

}