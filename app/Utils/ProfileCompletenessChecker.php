<?php

namespace App\Utils;

use Illuminate\Database\Eloquent\Model;

class ProfileCompletenessChecker
{
    public static function isProfileComplete(Model $user): bool
    {
        $fields = $user->getAttributes(); 
        // dd($fields);// Récupère tous les attributs du modèle
        foreach ($fields as $field) {
            // Vérifiez si le champ est null, vide ou une chaîne vide
            if ($field === 'bio' || $field === '' || (is_string($field) && trim($field) === '')) {
                return false;
            }
        }
    
        return true;
    }
}