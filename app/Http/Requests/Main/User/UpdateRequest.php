<?php

namespace App\Http\Requests\Main\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'name' => 'string|min:3|nullable',
            'surname' => 'string|min:3|nullable',
            'email' => 'email|min:3|nullable',
            'username' => 'string|min:3|nullable',
            'about_me' => 'string|nullable'
        ];
    }
}
