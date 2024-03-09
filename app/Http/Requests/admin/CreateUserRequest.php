<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'sexe' => 'required',
            'email' => 'required|email|unique:users,email|max:255',
            'telephone' => 'required|numeric|unique:users,telephone',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
            'terms' => 'required|accepted',
            'role' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'Le champ Nom & Prénom(s) est obligatoire.',
            'nom.max' => 'Le champ Nom & Prénom(s) ne peut pas dépasser :max caractères.',
            'role.required' => 'Le champ Role est obligatoire.',
            'sexe.required' => 'Le champ Sexe est obligatoire.',
            'email.required' => 'Le champ Adresse e-mail est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'email.max' => 'Le champ Adresse e-mail ne peut pas dépasser :max caractères.',
            'telephone.required' => 'Le champ Téléphone est obligatoire.',
            'telephone.numeric' => 'Veuillez saisir un numéro de téléphone valide.',
            'telephone.unique' => 'Cet numero telephone est déjà utilisée.',
            'password.required' => 'Le champ Mot de passe est obligatoire.',
            'password.min' => 'Le champ Mot de passe doit contenir au moins :min caractères.',
            'password_confirmation.required' => 'Le champ Répéter le Mot de passe est obligatoire.',
            'password_confirmation.same' => 'Les champs Mot de passe et Confirmer Mot de passe doivent correspondre.',
            'terms.required' => 'Vous devez accepter les règles pour vous inscrire.',
            'terms.accepted' => 'Vous devez accepter les règles pour vous inscrire.',
        ];
    }
}