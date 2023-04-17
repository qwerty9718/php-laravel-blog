<?php

namespace App\Http\Requests\Cabinet\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string',
            'content'=>'required',
            'category_id'=>'nullable',
            'image'=>'nullable|file',
            'second_image'=>'nullable|file',
            'tags' => 'array|nullable',
            'tags.*'=>'exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поля обязательно для заполнения',
            'content.required' => 'Это поля обязательно для заполнения',
        ];
    }
}
