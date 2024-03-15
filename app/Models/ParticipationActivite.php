<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipationActivite extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the ParticipationActivite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function participations(): BelongsToMany
    {
        return $this->belongsToMany(ParticipationActivite::class, 'user_id', 'user_id')->withTimestamps();
    }
}