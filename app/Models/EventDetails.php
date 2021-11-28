<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetails extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'event_id',
        'title',
        'start',
        'end',
    ];

    /**
     * Define Relationship With EventDetails
     * @return BelongsTo
     */
    public function eventDetails(): HasMany
    {
        return $this->hasMany(EventDetails::class);
    }
}
