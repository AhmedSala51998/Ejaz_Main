<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\ingaz\OrderDetailAction as objAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ingaz\OrderDetailRequest;
use App\Http\Resources\Api\OrderDetailResource as objResource;
use App\Models\OrderDetail as objModel;
use Illuminate\Http\Request;

class ApiOrderDetailController extends Controller
{
       public $postData = ['code','type','price','is_show','department_id',
        'title','description','main_image'];

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request, objAction $objAction)
        {
            $sql = $objAction->getIndex();
            return generalReturn($request,$sql,objResource::class, __("api.All items"));
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
        public function store(OrderDetailRequest $request, objAction $action)
        {
            $dataInsert = $request->only($this->postData);
            $dataInsert->code  = Product::generateUniqueCode();
            $store = User::where('id',Auth::user()->id)->where('type',UserType::Store->value)->first();
            if (isset($store->id)) {
                $data = $action->storeProduct($dataInsert,$request,Auth::user()->id);
                $products = objResource::make($data);
                return jsonSuccess($products);
            } else {
                return jsonSuccess(null,'sorry, only store can create product');
            }

        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $product = objModel::find($id);
            if (isset($product)) {
                $products = objResource::make($product);
                return jsonSuccess($products);
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
        public function update(OrderDetailRequest $request, $id, ObjAction $action)
        {
            $dataInsert = $request->only($this->postData);
            $data = $action->update($id, $dataInsert,$request);
            if (!$data) {
                return jsonSuccess(null,__('api.not found'),201);
            } else {
                $product = $action->find($id);
                $products = objResource::make($product);
                return jsonSuccess($products);
            }
        }

        public function update_status(Request $request, $id, ObjAction $action)
        {
            $obj =  objModel::find($id);
            if (!$obj) {
                return jsonSuccess(null,__('api.not found'),201);
            } else {
                $data['is_show'] = !$obj->is_show;
                $obj->update($data);
                return jsonSuccess();
            }
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id, ObjAction $action)
        {
            $data = $action->delete($id);
            if (!$data) {
                return jsonSuccess(null,__('api.not found'),201);
            } else {
                return jsonSuccess();
            }
        }
}
