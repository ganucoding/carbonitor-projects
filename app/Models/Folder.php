<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function certificationDocuments()
    {
        return $this->hasMany(CertificationDocuments::class, 'folder_id');
    }
}
