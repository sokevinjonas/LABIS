<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSignRequest extends FormRequest
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
            'telephone' => ['required', 'exists:users,telephone'],
            'password' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'telephone.required' => "Le numero de telephone est obligatoire.",
            'telephone.exists' => "Le numero de telephone saisi n'existe pas.",
            'password.required' => "Le mot de passe est obligatoire.",
        ];
    }
}