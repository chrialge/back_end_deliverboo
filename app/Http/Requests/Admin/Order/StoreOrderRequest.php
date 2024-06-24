<?php

namespace App\Http\Requests\Admin\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'restaurant_id' => 'required|integer',
            'customer_name' => 'required|min:3',
            'customer_lastname' => 'required|min:3',
            'customer_address' => 'required|min:6',
            'customer_phone_number' => 'required|integer',
            'customer_email' => 'required|email',
            'customer_note' => 'nullable|',
            'total_price' => 'required|numeric',
        ];
    }
}
