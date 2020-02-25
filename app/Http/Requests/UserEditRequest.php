<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserEditRequest extends FormRequest
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
        // dd($this->request->get('id'));
        return [
            "email"      => ['required' , Rule::unique('users')->ignore($this->request->get('id')) ] ,
            'name'       => "required",
            "role_id"    => 'required',
            "is_active"  => 'required',
            "photo"      => 'image',
        ];
    }
}
