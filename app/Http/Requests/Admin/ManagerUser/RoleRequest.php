<?php

namespace App\Http\Requests\Admin\ManagerUser;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    'name'                  => 'required|min:3|max:30|unique:roles,name,'.$this->role->id,
                ];
                break;

            default:
                $rules = [
                    'name'                  => 'required|min:3|max:30|unique:roles',
                ];
                break;
        }

        return $rules;
    }
}
