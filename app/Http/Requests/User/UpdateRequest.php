<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name'     => 'bail|required|string|min:3|max:40',
            'email'    => 'bail|required|string|email|max:100|unique:users,email,' . $this->user->id,
            'password' => 'bail|sometimes'
        ];
    }
}
