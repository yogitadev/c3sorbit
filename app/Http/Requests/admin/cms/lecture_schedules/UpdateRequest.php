<?php

namespace App\Http\Requests\admin\cms\lecture_schedules;

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
            'programcode_id' => ['required'],
            'lecture_date' => ['required'],
            'lecture_time' => ['required'],
            'subject_id' => ['required'],
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
           
        ];
    }
}
