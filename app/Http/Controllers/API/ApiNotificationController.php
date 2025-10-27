<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\ingaz\NotificationAction as objAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ingaz\NotificationRequest;
use App\Http\Resources\Api\NotificationResource as objResource;
use App\Models\Notification as objModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sql = objModel::where('user_id',Auth::user()->id);
        return generalReturn($request, $sql, objResource::class, __("api.All items"));
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
    public function store(Request $request)
    {
        //
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
        $data = objModel::where('user_id',Auth::user()->id)->find($id);
        if (!$data) {
            return jsonSuccess(null,__('api.not found'),201);
        } else {
            $data->delete();
            return jsonSuccess();
        }
    }
}
