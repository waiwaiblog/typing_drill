<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrillStore extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'category_id' => 'required',
            'difficulty' => 'required',
            'question1' => 'required|max:70',
            'question2' => 'required|max:70',
            'question3' => 'required|max:70',
            'question4' => 'required|max:70',
            'question5' => 'required|max:70',
            'question6' => 'nullable|max:70',
            'question7' => 'nullable|max:70',
            'question8' => 'nullable|max:70',
            'question9' => 'nullable|max:70',
            'question10' => 'nullable|max:70',
        ];
    }
}
