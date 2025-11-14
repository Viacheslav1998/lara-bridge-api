<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'phone.unique' => 'Такой телефон уже есть!',
            'number.unique' => 'такой номер уже есть!',
            'super.unique' => 'Поле Super уже существует',
            'bio.required' => 'Ты ничего не написал о себе! это важно заполни поле!',
            'country.required' => 'Город тоже нужно выбрать!',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'country'    => ['required', 'string', 'max:255'],
            'phone'      => ['required', 'string'],
            'number'     => ['required'],
            'super'      => ['required'],
            'email'      => ['required', 'email', 'max:255', 'unique:users,email'],
            'bio'        => ['required', 'string'],
        ];
    }
}