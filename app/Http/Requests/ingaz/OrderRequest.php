<?php

namespace App\Http\Requests\ingaz;

use App\Enums\ingaz\PaymentMethodEnum;
use App\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class OrderRequest extends MainRequest
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
//       dd( request()->details_list);
        // return [
        //     'payment_method' => ['required',new Enum(PaymentMethodEnum::class)],
        //     'maid_id' => 'required|exists:maids,id',
        //     'job_type_id' => 'required|exists:job_types,id',
        //     'details_list' => 'required_if:job_type_id,1,2',
        //     'details_list.admin_id' => 'required_if:job_type_id,1|exists:admins,id',
        //     'details_list.package_id' => 'required_if:job_type_id,2|exists:packages,id',
        //     'details_list.address_id' => 'required_if:job_type_id,2|exists:user_addresses,id',
        // ];
    }
}
