<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\ingaz\PhoneVerificationAction as objAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ingaz\auth\ConfirmCodeRequest;
use App\Http\Requests\ingaz\auth\RegisterRequest;
use App\Http\Requests\ingaz\auth\ResetPasswordRequest;
use App\Http\Requests\ingaz\auth\SendCodeRequest;
use App\Http\Requests\ingaz\PhoneVerificationRequest;
use Illuminate\Http\Request;

class ApiPhoneVerificationController extends Controller
{
    public $postData = ['phone_code','phone'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request, objAction $action)
    {
        $dataInsert = $request->only($this->postData);
        $data = $action->storeSendCode($dataInsert,$request);
        return jsonSuccess($data);
    }

    public function confirm_code(ConfirmCodeRequest $request, objAction $action)
    {
        $data = $action->confirmCode($request);
        if (!$data) {
            return response()->json([
                'code' => 422,
                'data' => $data,
                'message' => __('api.The code is wrong')
            ], 422);
        } else {
            return $data;
        }
    }

    public function reset_password(ResetPasswordRequest $request, objAction $action)
    {
        $data = $action->updatePassword($request);
        return jsonSuccess();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }
}
