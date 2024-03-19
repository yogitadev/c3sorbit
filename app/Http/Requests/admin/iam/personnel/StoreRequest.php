<?php

namespace App\Http\Requests\admin\iam\personnel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
            'email' => 'required|email|unique:users|max:252',
            'username' => 'required|unique:users|max:8',
            'password' => 'required|max:8',
        ];
    }
}
