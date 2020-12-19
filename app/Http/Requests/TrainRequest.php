<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainRequest extends FormRequest
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
            'name'  => 'required|max:100|unique:trains,name',
            'departure'  => 'required',
            'seats'  => 'required|integer:max:10',
        ];
    }
}
