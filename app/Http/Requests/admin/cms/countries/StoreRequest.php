<?php

namespace App\Http\Requests\admin\cms\countries;

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
            'shortname' => 'required|max:252',
            'name' => 'required|max:252',
            'phonecode' => 'required|numeric|digits_between:1,20',
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
