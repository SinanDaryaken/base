<?php

namespace Nonoco\Base\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends FormRequest
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:admins,email,' . ($this->admin ? $this->admin->id : '') . ',id,deleted_at,NULL'],
            'password' => ['nullable', 'confirmed', Password::min(8)->letters()->numbers()]
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'first_name' => 'Adı',
            'last_name' => 'Soyadı',
            'email' => 'E-Posta',
            'password' => 'Şifre'
        ];
    }
}
