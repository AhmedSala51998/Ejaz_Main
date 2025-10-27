<?php

namespace App\Http\Actions\ingaz;

use App\Enums\ingaz\ContractStatusEnum;
use App\Http\Actions\MainAction;
use App\Http\Resources\Api\UserResource;
use App\Http\Traits\SendSMSTrait;
use App\Models\Contract;
use App\Models\ContractInfo;
use App\Models\ContractStatusLog;
use App\Models\ingaz\PhoneVerification;
use App\Models\ingaz\User;
use App\Models\ingaz\UserAddress;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class ContractAction extends MainAction
{
    use SendSMSTrait;
    public function __construct(Contract $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/contract/';
    }

    public function saveUserData($request)
    {
        $newUser = User::create([
            'name' => $request->client_name,
            'phone_code' => "+966",
            'phone' => $request->client_phone,
            'nationality_id' => $request->nationality_id,
            'email' => $request->client_email,
            'national_num' => $request->client_national_num,
            'phone2' => $request->phone2,
            'city' => $request->city,
            'beds_num' => $request->beds_num,
            'family_num' => $request->family_num,
            'children' => $request->children,
            'job' => $request->job,
        ]);

        // Create user address
        UserAddress::create([
            'user_id' => $newUser->id,
            'address' => $request->address,
        ]);

        return $newUser;
    }

    public function saveContractStatus($contract,$status,$request)
    {
        ContractStatusLog::create([
            'contract_id' => $contract->id,
            'status' => $status,
            'date' => $request->contract_date,
        ]);
    }

    public function saveContractInfo($contractInfo,$contract)
    {
        $contractInfo['contract_id'] = $contract->id;
        ContractInfo::create($contractInfo);
    }


}
