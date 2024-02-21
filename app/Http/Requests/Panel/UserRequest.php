<?php

namespace App\Http\Requests\Panel;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    private $userId;
    public function prepareForValidation()
    {
        if ($this->username) {
            $user = User::where('username', $this->username)->first();
            if ($user) {
                $this->userId = $user->id;
            }
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'f_name' => [
                'required',
                'string'
            ],

            'l_name' => [
                'required',
                'string'
            ],

            'username' => [
                'required',
                'string',
                Rule::unique('users', 'username')->ignore($this->userId)
            ],

            'mobile' => [
                'required',
                'numeric',
                'digits:11',
                Rule::unique('users', 'username')->ignore($this->userId)
            ],

            'mobile_verify_code' => [
                'nullable',
                'numeric',
                'digits:5'
            ],

            'status' => [
                'required',
                'in:active,inactive'
            ],

            'gender' => [
                'required',
                'in:man,woman'
            ]
        ];
    }
}
