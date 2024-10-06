<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'sizes' => 'required|array', // Validate sizes as an array
            'sizes.*' => 'string|in:S,M,L,XL', // Optional validation for allowed size values
            'quantity' => 'required|integer|min:0',
            'rental_price' => 'required|numeric',
            'image_url' => 'nullable|string',
        ];
    }
}
