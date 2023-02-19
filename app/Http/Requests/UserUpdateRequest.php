<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    'name'          => 'required|min:3|max:80',
                    'email'         => 'required|email|max:80|unique:users,email,'.$this->user->id,
                    'role_id'       => 'required|exists:roles,id',
                ];
                break;
            default:
                $rules = [
                    'name'          => 'required|min:3|max:80',
                    'email'         => 'required|email|max:80|unique:users',
                    'role_id'       => 'required|exists:roles,id',
                ];
                break;
        }

        return $rules;
    }
}
