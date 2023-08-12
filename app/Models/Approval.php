<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $fillable = [
        'manager_name',
        'received',
        'approval_date',
    ];

    public function personnelform()
    {
        return $this->belongsTo(PersonnelForm::class);
    }
}