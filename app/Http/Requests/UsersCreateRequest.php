<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UsersCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // по умолчанию Laravel ставит здесь false
        // Если оставить false, то вы получите ошибку 403 - Forbidden for you
        // Изменить на true, либо же добавьте проверку, например return auth()->check();
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
            'email' => 'required|string|email|max:128|unique:users',
            'role_id' => 'required|integer|exists:roles,id',
        ];

    }
    public function messages(): array{
        return [
            'name.required' => 'Имя обязательно для заполнения',
            'surname.required' => 'Фамилия обязательно для заполнения',
            'email.required' => 'Электронная почта обязательно для заполнения',
            'email.email' => 'Введите корректный формат email адреса',
            'email.unique' => 'Пользователь с таким email уже существует',
            'role_id.exists' => 'Выбранная роль не найдена в базе данных',
        ];
    }
}
