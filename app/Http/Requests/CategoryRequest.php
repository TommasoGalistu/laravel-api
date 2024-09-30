<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories,name|min:2|max:40'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Il valore è obbligatorio',
            'name.unique' => 'Il valore è già all\'interno del db',
            'nami.min' => 'Il valore deve avere almeno :min caratteri',
            'nami.max' => 'Il valore deve avere massimo :max caratteri',
        ];
    }
}
