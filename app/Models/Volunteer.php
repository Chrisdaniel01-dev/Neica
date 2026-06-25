<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'skills',
        'availability',
        'motivation',
        'status',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
