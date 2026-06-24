<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;


class FormAdminRequest extends FormRequest
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
        // For Store
        $return[] = [

            'name'     => ['required', 'max:30', 'regex:/^([^0-9]*)$/'],
            'email'        => ['required', 'email', 'max:255', 'unique:admins,email'],
            'password' => ['required', 'min:3'],
            'role_id'  => ['required', 'exists:roles,id']
        ];

        // For Update
        if ($this->filled('_method') && $this->get('_method') == 'PATCH') {
            $return[] = [
                'email'    => ['required', 'email', 'max:40', Rule::unique('admins')->ignore($this->admin->id)],
                'password' => ['nullable', 'min:3'],
            ];
        }

        return Arr::collapse($return);
    }
}
