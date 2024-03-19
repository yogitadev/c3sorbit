<?php

namespace App\Http\Requests\admin\cms\media;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'files.*' => 'required|mimes:jpg,jpeg,png,pdf,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'files.*.required' => 'Please upload an image',
            'files.*.mimes' => 'Files with jpeg,png and pdf extensions are allowed',
            'files.*.max' => 'Maximum allowed size for an image is 2MB',
        ];
    }
}
