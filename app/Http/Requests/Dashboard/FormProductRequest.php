<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FormProductRequest extends FormRequest
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
                // 'name.*' => 'required|max:50|unique:product_translations,name,' . $this->product->id . ',product_id',
                'pr_code' => 'required|max:50|unique:products,pr_code,' . $this->product->id . ',id',
            ];
        }
        return [
            // 'name.*' => ['required' ,'max:255',Rule::unique('category_translations', 'name')],
            'title.*' => ['nullable', 'max:255'],
            'description.*' => ['nullable'],
            'keywords.*' => ['nullable', 'max:255'],
            'text.*' => ['nullable'],
            'locale' => ['nullable'],
            'parent_id' => ['nullable'],
        ];
    }
}
