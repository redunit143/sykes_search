<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    protected $redirect = '/admin/products';
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'regex:/^[a-z0-9A-Z\s]*$/'],
            'description' => ['nullable', 'regex:/^[a-z0-9A-Z\s,\\\\]*$/'],
            'qty' => 'required|integer|min:0|max:9999',
            'category' => 'required|min:1|max:999',
        ];
    }
}
