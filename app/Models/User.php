<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => Role::class,
    ];

    public function isAdmin() : bool 
    {
        return $this->role == Role::Admin;
    }
    
    public function isUser() : bool
    {
        return $this->role == Role::User;
    }


    public function presences()
    {
        return $this->hasOne(Presence::class);
    }

    public function VerifierSiProfileEstComplet(): bool
    {
         // Champs requis qui ne doivent pas être vides
         $requiredFields = ['nom', 'photo', 'telephone', 'whatsapp', 'email', 'password', 'sexe', 'role', 'profession', 'terms']; // Ajoutez d'autres champs si nécessaire
        $user = Auth::user();
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