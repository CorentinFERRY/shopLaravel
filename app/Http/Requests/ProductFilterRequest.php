<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
            'category'   => ['nullable', 'exists:categories,id'],
            'search'     => ['nullable', 'string', 'max:255'],
            'min_price'  => ['nullable', 'numeric', 'min:0'],
            'max_price'  => ['nullable', 'numeric', 'min:0', 'gte:min_price'],
            'sort'       => ['nullable', 'in:price,name,created_at'],
            'order'      => ['nullable', 'in:asc,desc'],
        ];
    }
}
