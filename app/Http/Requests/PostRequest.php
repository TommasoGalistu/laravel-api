<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:20|max:2000'
        ];
    }

    public function messages(){
        return [
            'title.required' => "L'inserimento del titolo è obbligatorio",
            'title.min' => "Devi inserire almeno :min caratteri",
            'title.max' => "Devi inserire massimo :max caratteri",
            'description.required' => "L'inserimento del testo è obbligatorio",
            'description.min' => "Devi inserire almeno :min caratteri",
            'description.max' => "Devi inserire almeno :max caratteri",
        ];
    }


}
