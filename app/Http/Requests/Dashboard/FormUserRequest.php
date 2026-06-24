<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormUserRequest extends FormRequest
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
        if ($this->filled('_method') && $this->get('_method') == 'PATCH') {
            $id = $this->route('user')->id; // Assuming 'resource' is the route parameter

            return [
                'name' => ['required' ,'max:255'],
                'username' => ['required' ,'max:255',Rule::unique('users', 'username')->ignore($id,'id')],
                'phone' => ['required','regex:/^\d{10}$/',Rule::unique('users', 'phone')->ignore($id,'id')],
            ];
        }else{
            return [
                'name' => ['required' ,'max:255'],
                'username' => ['required' ,'max:255',Rule::unique('users', 'username')],
                'phone' => ['required','regex:/^\d{10}$/',Rule::unique('users', 'phone')],
            ];
        }
    }
}
