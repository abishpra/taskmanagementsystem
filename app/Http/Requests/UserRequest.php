<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id=Auth::user()->id;
        return [
            'name'=>'required|min:3',
            'email'=>[
              'required',
                'email',
                Rule::unique('users')->ignore($id)
            ],
//            'email'=>'required|email|unique:user,email',
            'image'=>'mimes:jpeg,jpg,gif,png,bmp|max:2000'
        ];

    }

    public function messages()
    {
        return [
            'name.required'=>'User Name is required.'
        ];

    }
}
