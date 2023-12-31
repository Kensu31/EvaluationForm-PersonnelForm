<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralRemark extends Model
{
    protected $fillable = [
        'remarkable_performance',
        'rooms_for_improvements',
    ];

    public function personnelform()
    {
        return $this->belongsTo(PersonnelForm::class);
    }
}