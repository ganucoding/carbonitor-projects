<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'project_developer',
        'methodology',
        'standards_version',
        'project_scale',
        'product',
        'crediting_period_start',
        'crediting_period_end',
        'annual_estimated_credits',
        'description',
        'summary',
        'sources',
    ];

    protected $dates = [
        'crediting_period_start', // Cast as date
        'crediting_period_end',   // Cast as date
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
