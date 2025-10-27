<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\ingaz\UserAddressAction as objAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ingaz\UserAddressRequest;
use App\Http\Resources\Api\UserAddressResource as objResource;
use App\Models\UserAddress as objModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiUserAddressController extends Controller
{
    public $postData = ['address','title','phone','name','notes'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $address = objModel::where('user_id',Auth::user()->id)->get();
        $addresses = objResource::collection($address);
        return jsonSuccess($addresses, 'All Addresses');
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
    public function store(UserAddressRequest $request, objAction $action)
    {
        $dataInsert = $request->only($this->postData);
        $data = $action->storeUserAddress($dataInsert,$request);
        $addresses = objResource::make($data);
        return jsonSuccess($addresses);
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
    public function update(UserAddressRequest $request, $id, ObjAction $action)
    {
        $dataInsert = $request->only($this->postData);
        $data = $action->updateUserAddress($id, $dataInsert);
        if (!$data) {
            return jsonSuccess(null,'هذا العنوان غير موجود',201);
        } else {
            $address = $action->find($id);
            $addresses = objResource::make($address);
            return jsonSuccess($addresses);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, objAction $action)
    {
        $isDeleted = $action->deleteUserAddress($id);
        if ($isDeleted) {
            return jsonSuccess(null,'تم حذف العنوان بنجاح');
        } else {
            return jsonSuccess(null,'هذا العنوان غير موجود',201);
        }
    }
}
