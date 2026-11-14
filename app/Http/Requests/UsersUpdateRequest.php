<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            'name' => 'string|max:128',
            'surname' => 'string|max:128',
            'patronymic' => 'string|max:128',
            'email' => 'email|max:128|unique:users,email',
            'role_id' => 'exists:roles,id',
        ];
    }
    public function messages(): array{
        return [
            'email.unique' => 'Этот email уже используется другим пользователем',
            'role_id.exists' => 'Выбранная роль не существует',
        ];
    }
}
