<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ProfileCompletenessChecker
{
    public static function isProfileComplete(User $user): bool
    {
       // Champs requis qui ne doivent pas être vides
        $requiredFields = ['nom', 'photo', 'telephone', 'whatsapp', 'email', 'password', 'sexe', 'role', 'profession', 'terms']; // Ajoutez d'autres champs si nécessaire
        
        // Récupérer tous les attributs du modèle utilisateur
        $fields = $user->getAttributes();

        // Parcourir les champs requis
        foreach ($requiredFields as $fieldName) {
            // Vérifier si le champ est null, vide ou une chaîne vide
            if (!isset($fields[$fieldName]) || $fields[$fieldName] === '' || (is_string($fields[$fieldName]) && trim($fields[$fieldName]) === '')) {
                return false; // Si l'un des champs requis est vide, retourner false immédiatement
            }
        }

        // Si tous les champs requis sont remplis, retourner true
        return true;
    }
}