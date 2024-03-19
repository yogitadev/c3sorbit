<?php

namespace App\Http\Requests\admin\person\faculties;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\person\Faculty;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $item = Faculty::where('unique_id', $this->unique_id)->firstOrFail();

        return [
            'first_name' => 'required|max:252',
            'last_name' => 'required|max:252',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required|email|unique:faculties,email,'.$item->id.'|max:252',
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
