<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function getEventsAttribute()
    {
        return $this->events()->get()
            ->groupBy('day_of_week')
            ->map(function($events, $key) {
                return $events->sortBy('start_time');
            })->sortBy(function($events, $key) {
                return array_search($key, ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']);
            });
    }
}
