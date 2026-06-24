<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormAchievementRequest extends FormRequest
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
            $id = $this->route('achievement')->id; // Assuming 'resource' is the route parameter

            return [
                'title.0' => ['required','max:255',Rule::unique('achievement_translations', 'title')->ignore($id,'achievement_id')],
                'slug.0' => ['max:255',Rule::unique('achievement_translations', 'slug')->ignore($id,'achievement_id')],
            ];
        }else{
            return [
                'title.0' => ['required' ,'max:255',Rule::unique('achievement_translations', 'title')],
                'slug.0' => ['max:255',Rule::unique('achievement_translations', 'slug')],
            ];
        }
    }
}
