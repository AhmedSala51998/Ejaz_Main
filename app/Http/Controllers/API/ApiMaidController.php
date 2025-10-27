<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\ingaz\MaidAction as objAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ingaz\MaidRequest;
use App\Http\Resources\Api\MaidResource as xobjResource;
use App\Models\Biography as objModel;
use App\Models\Biography;
use Illuminate\Http\Request;

class ApiMaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, objAction $action)
    {
        $maids = $action->getMaids($request);
        return generalReturn($request, $maids, objResource::class, __("api.All items"));
        //    $data = objResource::collection($maids);
        //    return jsonSuccess($data,__('api.All items'));
    }


    public function search(Request $request, objAction $action)
    {
        $maids = $action->getMaidsSearch($request);
        return generalReturn($request, $maids, objResource::class, __("api.All items"));
        //    $data = objResource::collection($maids);
        //    return jsonSuccess($data,__('api.All items'));
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
        $cv = Biography::with('recruitment_office', 'nationalitie', 'language_title', 'religion', 'job', 'social_type', 'admin', 'images', 'skills')
            ->where('id', $id)
            ->first();
        if ($cv) {
            $data = new objResource($cv);

            return jsonSuccess($data, __('api.All items'));
        }

        return jsonSuccess(["id" => $id], __('api.not found'),404);
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
