<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailToBeNotified extends Model
{
    use HasFactory;

    protected $table = 'email_to_be_notified';

    protected $fillable = ['email', 'is_active'];

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }
}
