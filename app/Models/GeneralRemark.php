<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralRemark extends Model
{
    protected $fillable = [
        'remarkable_performance',
        'rooms_for_improvements',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}