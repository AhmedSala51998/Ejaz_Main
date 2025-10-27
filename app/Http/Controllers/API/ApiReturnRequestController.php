<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\ingaz\ReturnRequestAction as objAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ingaz\ReturnRequestRequest;
use App\Models\ReturnRequest as objModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiReturnRequestController extends Controller
{
        public $postData = ['maid_id','notes','order_id','file'];

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request, objAction $action)
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
        public function store(ReturnRequestRequest $request, objAction $action)
        {
            $dataInsert = $request->only($this->postData);
            $dataInsert['user_id'] = getAuthUser()->id;
            $data = $action->storeRequest($dataInsert);
            return jsonSuccess($data);

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
        public function edit($id, Request $request, ObjAction $action)
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
        public function update(Request $request, $id, ObjAction $action)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id, ObjAction $action)
        {
            //
        }
}
