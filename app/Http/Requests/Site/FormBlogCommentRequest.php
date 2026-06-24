<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class FormBlogCommentRequest extends FormRequest
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
            'comment'=>['nullable','string'],
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Adınız və Soyadınızı qeyd edin.',
            'name.max' => 'Adınız və Soyadınız 255 simvoldan çox olmamalıdır.',
            'email.required' => 'Emaili qeyd edin.',
            'email.email' => 'Email formatı yanlışdır.',
            'email.max' => 'Email 255 simvoldan çox olmamalıdır.',
        ];
    }
}
