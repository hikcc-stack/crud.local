<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SubjectsCreateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:128',
            'description' => 'required|string|max:255',
            'hours' => 'required|integer',
        ];

    }
    public function messages(): array{
        return [
            'name.required' => 'Название обязательно для заполнения',
            'description.required' => 'Описание обязательно для заполнения',
            'hours.required' => 'Количество часов обязательно для заполнения',
            'hours.integer' => 'Количество часов должно быть числом'
        ];
    }
}
