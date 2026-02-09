<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreProductRequest extends FormRequest
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
            'price' => 'required|numeric|min:0',
            'stock' => 'integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom du produit est obligatoire.',
            'price.required' => 'Le prix est obligatoire.',
            'price.min' => 'Le prix ne peut pas être négatif',
            'price.numeric' => 'Le prix doit être un nombre.',
            'stock.integer' => 'Le stock doit être un nombre entier',
            'stock.min' => 'Le sotck doit être positif',
            'category_id.required' => 'Veuillez sélectionner une catégorie.',
            'active' => 'boolean'
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
    // S'assurer que le prix a 2 décimales
    if ($this->has('price')) {
        $this->merge([
            'price' => round((float) $this->price, 2),
        ]);
    }
}
}
