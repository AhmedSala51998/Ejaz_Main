<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\ingaz\UserFirebaseTokenAction as objAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ingaz\UserFirebaseTokenRequest;
use App\Http\Resources\Api\UserFirebaseTokenResource as objResource;
use App\Http\Resources\Api\UserFirebaseTokenResource;
use App\Models\UserFirebaseToken as objModel;
use Illuminate\Http\Request;

class ApiUserFirebaseTokenController extends Controller
{
    public $postData = ['software_type','phone_token'];

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
        public function create(Request $request)
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(UserFirebaseTokenRequest $request, objAction $action)
        {
            $dataInsert = $request->only($this->postData);
            $data = $action->storeUserFirebaseToken($dataInsert,$request);
            return jsonSuccess($data, __("auth.done successfully"),200);

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
        public function edit($id, Request $request)
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
        public function update(UserFirebaseTokenRequest $request, $id)
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
