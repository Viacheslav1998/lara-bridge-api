<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Contracts\Validation\ValidationRule;

class UserFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'Имя обязательно для заполнения.',
            'first_name.min' => 'Имя должно содержать минимум :min символа.',
            'last_name.required' => 'Фамилия обязательна.',
            'email.required' => 'Email обязателен.',
            'email.email' => 'Некорректный формат email.',
            'email.unique' => 'Такой email уже зарегистрирован.',
            'phone.unique' => 'телефон обязателен для заполнения.',
            'number.unique' => 'номер обязателен для заполнения.',
            'super.unique' => 'поле супер обязательно для заполнения.',
            'bio.unique' => 'о себе обязательно для заполнения.',
            'country.unique' => 'город обязательно для заполнения.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => [
                'firts_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'phone' => ['required'],
                'number' => ['required'],
                'super' => ['required'],
                'email' => ['required', 'string', 'max:255'],
                'bio' => ['required', 'string'],
            ],
            'PUT', 'PATCH' => [
                'firts_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'country' => ['required', 'string', 'max:255'],
                'phone' => ['required'],
                'number' => ['required'],
                'super' => ['required'],
                'email' => ['required', 'string', 'max:255'],
                'bio' => ['required', 'string'],                
            ],
            'GET' => [
                'country' => ['nullable', 'string', 'size:2'],
                'active' => ['nullable', 'boolean']
            ],
            default => [],
        };
    }
}
