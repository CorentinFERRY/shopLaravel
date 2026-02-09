<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreCategoryRequest extends FormRequest
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
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'string|nullable'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du produit est obligatoire.',
        ];
    }

    protected function prepareForValidation(): void
    {
    // Générer le slug à partir du nom si non fourni
    if (empty($this->slug) && !empty($this->name)) {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
    // Nettoyer les espaces du nom
    if ($this->has('name')) {
        $this->merge([
            'name' => trim($this->name),
        ]);
    }
    }   
}
