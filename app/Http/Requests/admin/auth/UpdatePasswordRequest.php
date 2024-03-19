<?php

namespace App\Http\Requests\admin\auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'new_password' => [
                'required',
                'max:8',
            ],
            'confirm_password' => [
                'required',
                'same:new_password',
                'max:8',
            ],
        ];
    }
}
