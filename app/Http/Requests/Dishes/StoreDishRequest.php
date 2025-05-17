<?php

namespace App\Http\Requests\Dishes;

use App\Models\User;
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
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:500'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'price' => ['required', 'numeric', 'min:0.01', 'max:1000.00'],
            'ingredients' => ['nullable', 'array'],
        ];
    }
}
