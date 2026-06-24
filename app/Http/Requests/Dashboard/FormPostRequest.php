<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FormPostRequest extends FormRequest
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
                // 'title' => 'required|max:255|unique:posts,title,' . $this->post->id . ',id',
                'title' => 'required|max:255|',
                'post_no' => 'required|max:50|unique:posts,post_no,' . $this->post->id . ',id',
            ];
        }
    }
}
