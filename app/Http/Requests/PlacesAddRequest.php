<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PlacesAddRequest extends Request
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
            "name" => ["required", "unique:places,name"],
            "health" => ["required", "min:1", "max:5", "integer"],
        ];
    }
}
