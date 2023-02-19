<?php

namespace App\Http\Requests\Admin\ManagerUser;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
                    'name'                  => 'required|min:3|max:30|unique:permissions,name,'.$this->permission->id,
                    'description'           => 'max:100',
                ];
                break;

            default:
                $rules = [
                    'name'                  => 'required|min:3|max:30|unique:permissions',
                    'description'           => 'max:100',
                ];
                break;
        }

        return $rules;
    }
}
