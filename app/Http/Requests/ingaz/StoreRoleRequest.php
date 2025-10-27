<?php

namespace App\Http\Requests\ingaz;

use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends MainRequest
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
        // Extract the role ID from the URL
        $roleId = $this->route('role');

        return [
            'name' => 'required|unique:roles,name,' . $roleId,
            'description' => 'required',
            'display_name' => 'required|unique:roles,display_name,' . $roleId,
            'permission' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => helperTrans('ingaz.the name is required'),
            'name.unique' => helperTrans('ingaz.you entered this role before'),
            'description.required' => helperTrans('ingaz.the description is required'),
            'display_name.required' => helperTrans('ingaz.the display name is required'),
            'display_name.unique' => helperTrans('ingaz.you entered this display name before'),
            'permission.required' => helperTrans('ingaz.please select the permissions'),
        ];
    }
}
