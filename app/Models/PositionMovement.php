<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionMovement extends Model
{
    protected $fillable = [
        'reason_for_upgrade',
        'effective_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}