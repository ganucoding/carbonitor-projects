<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'date',
        'vintage',
        'serial_number',
        'quantity',
        'product',
        'status',
        'note',

        'using_entity',
        'use_case',
        'use_case_authorisation',
        'corresponding_adjustment',
    ];

    protected $dates = [
        'date', // Cast as date
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
