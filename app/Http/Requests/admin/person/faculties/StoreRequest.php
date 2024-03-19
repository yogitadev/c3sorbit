<?php

namespace App\Http\Requests\admin\person\faculties;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:252',
            'last_name' => 'required|max:252',
            'gender' => 'required',
            'dob' => 'required',
            'username' => 'required|unique:faculties|max:8',
            'password' => 'required|max:8',
            'email' => 'required|email|unique:faculties|max:252',
            'mobile_number' => 'required|numeric|digits_between:1,20',
            'altenative_email' => 'nullable|email|max:252',
            'alternative_mobile_number' => 'nullable|numeric|digits_between:1,20',
            'media' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
