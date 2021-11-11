<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    protected $redirect = '/';
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
            'location' => 'nullable|alpha',
            'near_beach' => 'nullable|integer|min:0|max:1',
            'accepts_pets' => 'nullable|integer|min:0|max:1',
            'sleeps' => 'nullable|integer|min:1|max:10',
            'beds' => 'nullable|integer|min:1|max:10',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ];
    }
}
