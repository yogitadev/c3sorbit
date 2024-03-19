<?php

namespace App\Http\Requests\admin\course\programcodes;

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
            'institution_id' => 'required',
            'campus_id' => 'required',
            'program_name' => 'nullable|max:252',
            'program_name_spanish' => 'required',
            'program_code' => 'required',
            'awarding_body_id' => 'required',
            'course_duration' => 'required',
            'uk_credit' => 'required',
            'ects_credit' => 'required',
            'eng_program' => 'required',
            'eng_course_duration' => 'required',
            'eng_course_fees' => 'required',
            'eu_tution_fee' => 'required',
            'eu_app_fee' => 'required',
            'eu_year_fee' => 'required',
            'non_eu_tutuion_fee' => 'required',
            'non_eu_app_fee' => 'required',
            'non_eu_year_fee' => 'required',
            'online_tutuion_fee' => 'required',
            'online_app_fee' => 'required',
            'online_year_fee' => 'required',
            'media' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'required',
        ];
    }
}
