<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
            'description' => 'required',
            'price' => 'required|integer',
            'stok' => 'required|integer',
            'picture' => 'required|mimes:jpg,png,jpeg|image|max:2048',
        ];
    }
}
