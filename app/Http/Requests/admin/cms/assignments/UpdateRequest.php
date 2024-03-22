<?php

namespace App\Http\Requests\admin\cms\assignments;

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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'faculty_id' => ['required'],
            'subject_id' => ['required'],
            'assignment_title' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'media' => 'mimes:pdf,doc,docx|max:2048',
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
           
        ];
    }
}
