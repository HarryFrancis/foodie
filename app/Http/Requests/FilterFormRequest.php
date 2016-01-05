<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FilterFormRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            "distance" => ["required", "integer"],
            // 'lat' => 'required',
            // 'lng' => 'required'
        ];
    }

    /**
     * Validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'lat.required' => 'Please select a location on the map',
            'lng.required' => 'Please select a location on the map',
        ];
    }
}
