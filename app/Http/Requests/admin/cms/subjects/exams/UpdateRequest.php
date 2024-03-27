<?php

namespace App\Http\Requests\admin\cms\subjects\exams;

use Illuminate\Foundation\Http\FormRequest;

// Models
use App\Models\cms\Exam;

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
        $item = Exam::where('unique_id', $this->unique_id)->firstOrFail();

        return [
            'exam_date' => 'required|unique:exams,exam_date,'.$item->id,
            'exam_duration' => ['required'],
            'question.*' => ['required'],
            'option1.*' => ['required'],
            'option2.*' => ['required'],
            'option3.*' => ['required'],
            'option4.*' => ['required'],
            'correct_answer.*' => ['required'],
            'status' => ['required'],
        ];
    }

    public function messages()
    {
        return [
           
        ];
    }
}
