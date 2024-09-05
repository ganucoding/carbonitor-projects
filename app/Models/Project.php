<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'type', 'country'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
