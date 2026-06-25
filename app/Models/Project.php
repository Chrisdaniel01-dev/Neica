<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'goal_amount',
        'current_amount',
        'status',
        'target_audience',
        'impact',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'goal_amount' => 'integer',
        'current_amount' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected $appends = ['progress_percentage'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $slug = Str::slug($project->title);
                $count = static::where('slug', 'LIKE', $slug.'%')->count();
                $project->slug = $count ? $slug . '-' . $count : $slug;
            }
        });
    }

    public function getProgressPercentageAttribute()
    {
        if ($this->goal_amount <= 0) {
            return 0;
        }
        $percentage = ($this->current_amount / $this->goal_amount) * 100;
        return min(100, max(0, $percentage));
    }

    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class);
    }
}
