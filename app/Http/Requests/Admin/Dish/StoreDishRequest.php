<?php

namespace App\Http\Requests\Admin\Dish;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            'name' => 'required|min:3|max:50|unique:dishes',
            'image' => 'nullable|image',
            'ingredients' => 'nullable',
            'price' => 'required|numeric',
            'visibility'=> 'required|boolean',
        ];
    }
}
