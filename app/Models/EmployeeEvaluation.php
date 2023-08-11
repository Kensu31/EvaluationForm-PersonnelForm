<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEvaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_name',
        'reviewer',
        'job_title',
        'review_period',
        'ratingQuality',
        'ratingAttendance',
        'ratingReliability',
        'ratingCommunication',
        'ratingJudgment',
        'ratingInitiative',
        'ratingKnowledge',
        'ratingTraining',
        'ratingScore',
        'goals',
        'comments'
    ];
}