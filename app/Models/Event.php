<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Activities in this event
     * @return \Jenssegers\Mongodb\Relations\HasMany
     */
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * Check if this event happens today or not
     * @return bool
     */
    public function isToday(): bool
    {
        $today = strtolower(date('D'));
        $dayOfWeek = strtolower($this->day_of_week);

        return $today == substr($dayOfWeek, 0, 3);
    }

    /**
     * Check if this event already happened today or not
     * @return bool
     */
    public function isPast(): bool
    {
        return time() > strtotime($this->end_time);
    }

    /**
     * Check if this event is happening now
     * @return bool
     */
    public function isNow(): bool
    {
        return time() >= strtotime($this->start_time) && time() < strtotime($this->end_time);
    }

    /**
     * Check if this event has not started yet
     * @return bool
     */
    public function isFuture(): bool
    {
        return time() < strtotime($this->start_time);
    }
}
