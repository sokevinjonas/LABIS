<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'telephone' => 'required|numeric|unique:users,telephone,except',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|same:password',
            'terms' => 'required|accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le champ Nom et Prénom est obligatoire.',
            'name.max' => 'Le champ Nom et Prénom ne peut pas dépasser :max caractères.',
            'email.required' => 'Le champ Email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'email.max' => 'Le champ Email ne peut pas dépasser :max caractères.',
            'telephone.required' => 'Le champ Numéro de téléphone est obligatoire.',
            'telephone.numeric' => 'Veuillez saisir un numéro de téléphone valide.',
            'telephone.unique' => 'Cet numero de telephone est déjà utilisée.',
            'password.required' => 'Le champ Mot de passe est obligatoire.',
            'password.min' => 'Le champ Mot de passe doit contenir au moins :min caractères.',
            'confirm_password.required' => 'Le champ Répéter le Mot de passe est obligatoire.',
            'confirm_password.same' => 'Les champs Mot de passe et Répéter le Mot de passe doivent correspondre.',
            'terms.required' => 'Vous devez accepter les règles pour vous inscrire.',
            'terms.accepted' => 'Vous devez accepter les règles pour vous inscrire.',
        ];
    }
}