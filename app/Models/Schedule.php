<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function getEventsByWeekday()
    {
        return $this->events()->get()
            ->groupBy('day_of_week')
            ->sortBy(function($rows, $key) {
                $order = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                return array_search($key, $order);
            })
            ->map(function($events, $key) {
                return $events->sortBy('start_time');
            })->sortBy(function($events, $key) {
                return array_search($key, ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']);
            });
    }
}
