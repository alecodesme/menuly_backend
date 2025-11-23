<?php

namespace App\Http\Requests\Requests\Ingredient;

use Illuminate\Foundation\Http\FormRequest;

class StoreIngredientRequest extends FormRequest
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
            'name' => 'required|string|min:2',
            'alias' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ingredient name is required',
            'name.string' => 'Ingredient name must be a string',
            'name.min' => 'Ingredient name must have at least 2 characters',
        ];
    }
}
