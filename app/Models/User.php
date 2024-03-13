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
        $user= Auth::user();
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