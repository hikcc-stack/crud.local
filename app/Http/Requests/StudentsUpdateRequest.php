<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentsUpdateRequest extends FormRequest
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
            'surname' => 'required|string|max:128',
            'patronymic' => 'nullable|string|max:128',
            'birthday' => 'required|date',
            'group_id' => 'required|integer|exists:groups,id',
        ];

    }
    public function messages(): array{
        return [
            'name.required' => 'Имя обязательно для заполнения',
            'surname.required' => 'Фамилия обязательно для заполнения',
            'birthday.date' => 'Дата должна быть корректной',
            'birthday.required' => 'Дата должна быть обязательной',
            'group_id.exists' => 'Выбранная группа не найдена в базе данных',
        ];
    }
}
