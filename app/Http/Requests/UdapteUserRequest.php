<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UdapteUserRequest extends FormRequest
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
        $user = Auth::user();
        return [
            'nom' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'telephone' => 'required|numeric|unique:users,telephone,' . $user->id,
            'whatsapp' => 'required|numeric|unique:users,whatsapp,' . $user->id,
            'sexe' => 'required|in:M,F',
            'profession' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'Le champ Nom & Prénom(s) est requis.',
            'nom.string' => 'Le champ Nom & Prénom(s) doit être une chaîne de caractères.',
            'email.required' => 'Le champ Email est requis.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée par un autre utilisateur.',
            'telephone.required' => 'Le champ Numéro de téléphone est requis.',
            'telephone.numeric' => 'Le champ Numéro de téléphone doit être numérique.',
            'telephone.unique' => 'Ce numéro de téléphone est déjà utilisé par un autre utilisateur.',
            'whatsapp.numeric' => 'Le champ Numéro WhatsApp doit être numérique.',
            'whatsapp.required' => 'Le champ Numero WhatsApp est requis.',
            'whatsapp.unique' => 'Ce numéro WhatsApp est déjà utilisé par un autre utilisateur.',
            'sexe.required' => 'Le champ Sexe est requis.',
            'sexe.in' => 'Le champ Sexe doit être soit "M" pour Homme, soit "F" pour Femme.',
            'profession.string' => 'Le champ Profession doit être une chaîne de caractères.',
            'profession.max' => 'Le champ Profession ne doit pas dépasser :max caractères.',
            'profession.required' => 'Le champ Profession est requis.',
            'bio.string' => 'Le champ Bio doit être une chaîne de caractères.',
        ];
    }

}