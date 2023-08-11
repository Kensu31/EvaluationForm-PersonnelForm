<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'title',
        'level',
    ];

    public function positionMovements()
    {
        return $this->hasMany(PositionMovement::class);
    }
}