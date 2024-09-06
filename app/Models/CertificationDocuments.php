<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificationDocuments extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'folder_id', 'file_name', 'file_path'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
