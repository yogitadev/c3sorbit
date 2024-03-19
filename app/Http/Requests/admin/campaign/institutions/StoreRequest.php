<?php

namespace App\Http\Requests\admin\campaign\institutions;

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
            'name' => 'required|max:252',
            'email' => 'required|email|unique:institutions|max:252',
            'mobile_number' => 'required|numeric|digits_between:1,20',
            'website_url' => 'nullable|url|max:252',
            'media' => 'mimes:jpg,jpeg,png|max:2048',
            'facebook_url' => 'nullable|url|max:252',
            'instagram_url' => 'nullable|url|max:252',
            'twitter_url' => 'nullable|url|max:252',
            'linkedin_url' => 'nullable|url|max:252',
            'youtube_url' => 'nullable|url|max:252'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Please enter valid email address',
            'email.unique' => 'This email address already uesd',
            'mobile_number.numeric' => 'Only numerice are allowed',
            'media.mimes' => 'Files with jpeg & png extensions are allowed',
            'media.max' => 'Maximum allowed size for an image is 2MB',
        ];
    }
}
