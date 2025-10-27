<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\ingaz\ContactAction as objAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ingaz\ContactRequest;
use App\Http\Resources\Api\ContactResource as objResource;
use App\Models\Contact as objModel;
use Illuminate\Http\Request;

class ApiContactController extends Controller
{
    public $postData = ['name','email','phone','subject','message'];
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
    public function store(ContactRequest $request, objAction $action)
    {
        $dataInsert = $request->only($this->postData);
        $contact = $action->store($dataInsert);
        $data = objResource::make($contact);
        return jsonSuccess($data,'تم بنجاح',200);
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
