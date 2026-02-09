<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
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
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:0'
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'L\'id du produit est obligatoire',
            'product_id.integer' => 'L\'id produit doit être un nombre entier',
            'quantity.required' => 'La quantitée est obligatoire',
            'quantity.integer' => 'La quantitée doit être un nombre entier'      
        ];
    }
}
