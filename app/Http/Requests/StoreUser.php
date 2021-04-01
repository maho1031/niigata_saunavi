<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()  //認証しているかどうか
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
            'name' => 'required|string|max:20',
            'email' => ['required', 'email',Rule::unique('users')->ignore(Auth::id())],
            // 'email' => ['required','email', Rule::unique('users')->ignore($this->id)->whereNull('deleted_at')],
            // 'email' => 'required|email|max:255|unique:users,email',
            'prof_pic' => 'file|image|max:1024|nullable'
        ];
    }
}
