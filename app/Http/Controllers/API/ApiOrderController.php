<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\ingaz\OrderAction as objAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ingaz\OrderRequest;
use App\Http\Resources\Api\OrderResource as objResource;
use App\Models\Order as objModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiOrderController extends Controller
{
       public $postData = ['maid_id','job_type_id','payment_method'];

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request, objAction $action)
        {
            $rules = [
                'status' => 'required|in:current,previous',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return jsonValid($validator->errors());
            }
            $data = $action->getIndex($request->input('status'));
            return generalReturn($request,$data,objResource::class, __("api.All items"));

            // $order = objResource::collection($data);
            // return jsonSuccess($order);
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
        public function store(OrderRequest $request, objAction $action)
        {
            $dataInsert = $request->only($this->postData);
            $data = $action->storeOrder($dataInsert,$request);
            if ($request->payment_method == "online")
            {
                $data = [
                    "order" => objResource::make($data),
                    "redirectUrl" => "#",
                    'paymentSuccess' => "#",
                    'paymentaFiled' => "#",
                ];
            } else {
                $data = [
                    "order" => objResource::make($data),
                    "redirectUrl" => "#",
                    'paymentSuccess' => "#",
                    'paymentaFiled' => "#",
                ];
            }
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
            $data = objModel::where('user_id',Auth::user()->id)->find($id);
            if (isset($data)) {
                $order = objResource::make($data);
                return jsonSuccess($order);
            } else {
                return jsonSuccess(null,__('api.not found'),201);
            }
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
        public function update(OrderRequest $request, $id, ObjAction $action)
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
