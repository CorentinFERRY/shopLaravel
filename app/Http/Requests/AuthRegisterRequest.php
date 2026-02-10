<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class AuthRegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages():array 
    {
        return [
            'name.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'email est obligatoire',
            'email.unique' => 'L\'adresse email est déjà associée à un compte',
            'email.email' => 'Le format de l’email est invalide',
            'password.required' => 'Merci de rentrer un mot de passe',
            'password.min' => 'Le mot de passe doit contenir au minimum 8 caractères',
            'password.confirmed' => 'Les mots de passe ne correspondent pas'      
        ];
    }

    public function userData(): array
    {
        return [
            'name' => $this->validated('name'),
            'email' => $this->validated('email'),
            'password' => Hash::make($this->validated('password')),
        ];
    }
}
