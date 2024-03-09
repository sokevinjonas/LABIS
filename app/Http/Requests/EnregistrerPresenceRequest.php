<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnregistrerPresenceRequest extends FormRequest
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
            'heure_arriver' => ['required', 'string'],
            // 'heure_depart' => ['required', 'string'],
            'motif' => ['required', 'string'],
            // 'date_du_jour' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'heure_arriver.required' => 'Le champ heure d\'arrivée est requis.',
            'heure_arriver.string' => 'Le champ heure d\'arrivée doit être une chaîne de caractères.',

            // 'heure_depart.required' => 'Le champ heure de départ est requis.',
            // 'heure_depart.string' => 'Le champ heure de départ doit être une chaîne de caractères.',

            'motif.required' => 'Le champ motif est requis.',
            'motif.string' => 'Le champ motif doit être une chaîne de caractères.',

            // 'date_du_jour.string' => 'Le champ date du jour doit être une chaîne de caractères.',
        ];
    }
}