<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GroupsUpdateRequest extends FormRequest
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
            'profession' => 'required|string|max:128',
            'count_students' => 'required|integer',
        ];

    }
    public function messages(): array{
        return [
            'name.required' => 'Название обязательно для заполнения',
            'profession.required' => 'Профессия обязательно для заполнения',
            'count_students.required' => 'Количество студентов обязательно для заполнения(по умолчанию 25)',
            'count_students.integer' => 'Количество студентов должно быть числом'
        ];
    }
}
