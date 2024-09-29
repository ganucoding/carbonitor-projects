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
        'project_validator',
        'methodology',
        'standards_version',
        'project_scale',
        'product',
        'crediting_period_start',
        'crediting_period_end',
        'annual_estimated_credits',
        'metric_id',
        'description',
        'summary',
        'sources',
        'sources_label',
        'google_maps_embed_code',
        'compliance',
    ];

    protected $dates = [
        'crediting_period_start', // Cast as date
        'crediting_period_end',   // Cast as date
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function metric()
    {
        return $this->belongsTo(Metric::class);
    }
}
