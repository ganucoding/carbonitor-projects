<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuance extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'vintage',
        'quantity',
        'product',
        'issuance_date',

        'project_issued_to',
        'serial_number',
        'status',
        'monitoring_period_start',
        'monitoring_period_end',
        'eligibilities_corsia_pilot_phase',
        'attributes_emission_reduction',
        'history',
    ];

    protected $dates = [
        'issuance_date', // Cast as date
        'monitoring_period_start', // Cast as date
        'monitoring_period_end',   // Cast as date
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
