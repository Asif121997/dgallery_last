<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class FormOnlineAppointmentRequest extends FormRequest
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
            'name'=>['max:255','required'],
            'email'=>['nullable','email','max:255'],
            'phone'=>['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'subject'=>['nullable','string','max:255'],
            'text'=>['nullable','string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Adınız və Soyadınızı qeyd edin.',
            'name.max' => 'Adınız və Soyadınız 255 simvoldan çox olmamalıdır.',
            'email.email' => 'Email formatı yanlışdır.',
            'email.max' => 'Email 255 simvoldan çox olmamalıdır.',
            'phone.required' => 'Telefon nömrənizi qeyd edin.',
            'phone.regex' => 'Telefon formatı yanlışdır.',
            'phone.min' => 'Telefon nömrəniz min. 10 simvol olmalıdır.',
            'subject.max' => 'Mövzu 255 simvoldan çox olmamalıdır.',
        ];
    }
}
