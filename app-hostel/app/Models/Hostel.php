<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hostel extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the hostel.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }

     /**
     * Get the rooms for the hostel.
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Rooms::class);

        $rooms = Hostel::find(1)->rooms;
        foreach ($rooms as $room) {
        // ...
        }
    }

}
