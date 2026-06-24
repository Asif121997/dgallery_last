<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FormCategoryRequest extends FormRequest
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
            return [
                'name.0' => 'required|max:50|unique:category_translations,name,' . $this->category->id . ',category_id',
            ];
        }
        return [
            'name.0' => ['required' ,'max:255',Rule::unique('category_translations', 'name')],
            'title.*' => ['nullable', 'max:255'],
            'description.*' => ['nullable'],
            'keywords.*' => ['nullable', 'max:255'],
            'text.*' => ['nullable'],
            'locale' => ['nullable'],
            'parent_id' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'name.0.required' => 'The Name (Az) field is required.',
            'name.1.required' => 'The Name (En) field is required.',
            'name.2.required' => 'The Name (Ru) field is required.',
            'name.0.unique' => 'The Name (Az) has already been taken.',
            'name.1.unique' => 'The Name (En) has already been taken.',
            'name.2.unique' => 'The Name (Ru) has already been taken.',
        ];
    }
}
