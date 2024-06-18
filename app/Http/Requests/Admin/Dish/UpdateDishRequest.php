<?php

namespace App\Http\Requests\Admin\Dish;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'image' => 'nullable|image',
            'ingredients' => 'required',
            'price' => 'required|numeric|min:0.00',
            'visibility' => 'required|boolean',
        ];
    }
}
