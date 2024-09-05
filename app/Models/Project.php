<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['unique_id', 'name', 'status', 'type', 'country'];

    public function projectDetail()
    {
        return $this->hasOne(ProjectDetail::class);
    }

    public function issuances()
    {
        return $this->hasMany(Issuance::class);
    }

    public function certificationDocuments()
    {
        return $this->hasMany(CertificationDocuments::class);
    }

    public function retirements()
    {
        return $this->hasMany(Retirement::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
