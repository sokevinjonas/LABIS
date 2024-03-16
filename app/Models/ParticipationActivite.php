<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ParticipationActivite extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * The roles that belong to the ParticipationActivite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function participations(): BelongsToMany
    {
        return $this->belongsToMany(ParticipationActivite::class, 'user_id', 'user_id')->withTimestamps();
    }

    // Méthode pour vérifier si un utilisateur a déjà participé à une activité
    public static function utilisateurAdejaParticipe($activiteId)
    {
        $user = Auth::user();

        if ($user) {
            // Vérifie s'il y a un enregistrement correspondant à l'utilisateur connecté et à l'activité donnée
            $participation = self::where('activite_id', $activiteId)
                                ->where('user_id', $user->id)
                                ->exists();

            return $participation;
        }

        return false; // Aucun utilisateur n'est connecté
    }
}