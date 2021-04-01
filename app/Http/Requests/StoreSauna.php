<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSauna extends FormRequest
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
            'name' => 'required|string|max:255',
            'city_id' => 'required',
            'address' => 'required|string|max:255',
            'holiday_id' => 'required',
            'url' => 'url|nullable',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'integer',
            'pic1' => 'file|image|max:1024|nullable'
        ];
    }
}
