<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

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
        return [
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=208,min_height=208',
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes' =>'The avatar must be a picture in jpeg, bmp, png, gif format',
            'avatar.dimensions' => 'Image clarity is not enough, width and height require 208px or more',
            'name.unique' => 'Name has been token, please use other name',
            'name.regex' => 'Usernames only support letters, numbers, bars, and underscores.',
            'name.between' => 'Username must be between 3 - 25 characters.',
            'name.required' => 'Username can not be empty.',
        ];
    }
}
