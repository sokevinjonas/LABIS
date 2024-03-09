<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoUpdateRequest extends FormRequest
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
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'photo.required' => 'Cet champ ne doit pas etre vide',
            'photo.image' => 'Le fichier doit être une image.',
            'photo.mimes' => 'La photo doit être de type jpeg, png, jpg, gif ou svg.',
            'photo.max' => 'La taille de la photo ne doit pas dépasser 2048 Ko.',
        ];
    }
}