<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'username', 'email', 'comment', 'status', 'status_changed_by'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function statusChanger()
    {
        return $this->belongsTo(User::class, 'status_changed_by');
    }
}
