<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetirementStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function retirements()
    {
        return $this->hasMany(Retirement::class, 'retirement_status_id');
    }
}
