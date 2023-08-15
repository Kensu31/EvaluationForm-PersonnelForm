<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationForm extends Model
{
    use HasFactory;
    protected $fillable=[
        'reviewer',
        'review_period',
        'rating',

    ];
    public function evaluationFormAnswer(){
        return $this->hasOne(EvaluationFormAnswer::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

}
