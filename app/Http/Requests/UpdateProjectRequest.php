<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
        return [
            'title' => ['required', 'max:30'],
            'description' => ['required', 'max:200'],
            'category_id' => ['nullable', 'exists:types,id'],
            'type_id' => ['nullable', 'exists:types,id'],
            'cover_image' => ['nullable', 'image']
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'description.required'  => 'La descrizione è obbligatoria',
            'title.max' => 'Il titolo è troppo lungo',
            'description.max'  => 'La descrizione è troppo lunga',
        ];
    }
}
