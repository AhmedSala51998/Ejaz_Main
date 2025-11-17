<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Traits\Upload_Files;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\OurService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Cache;



class AdminOurServicesController extends Controller
{

    use Upload_Files;


    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!checkPermission(36))
            return view('admin.permission');

        if ($request->ajax()) {
    $our_services = OurService::query()->latest();

            return DataTables::of($our_services)
                ->editColumn('image', function ($row) {
                    return ' <img src="'.get_file($row->image).'" class="rounded" style="height:60px;width:60px;object-fit: contain;"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d',strtotime($row->created_at));
                })
                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->addColumn('actions', function ($row) {
                    $edit = '';
                    $delete = '';
                    if (!checkPermission(38))
                        $edit = 'hidden';
                    if (!checkPermission(39))
                        $delete = 'hidden';
                    return "<button ".$edit."   class='btn btn-info editButton' id='" . $row->id . "'> <i class='fa fa-edit'></i></button>
                   <button " .$delete." class='btn btn-danger  delete' id='" . $row->id . "'><i class='fa fa-trash'></i> </button>";
                })
                ->rawColumns(['actions', 'image', 'delete_all','title'])->make(true);
        }
        return view('admin.crud.our_services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()){
            $returnHTML = view("admin.crud.our_services.parts.add_form")->with([
                'languages'=>Language::where('is_active','active')->get(),
            ])->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'image'=>'required|file|image',
            'title'=>'required|array',
            'title.*'=>'required',
            'desc'=>'required|array',
            'desc.*'=>'required',
        ]);
        //$data = $request->except(['title','desc']);
        $name = [];
        $desc = [];
        foreach (Language::where('is_active','active')->get() as $index=>$language){
            $name[$language->title] = $request->title[$index];
            $desc[$language->title] = $request->desc[$index];
        }
        $data['title'] = $name;
        $data['desc'] = $desc;
        $data ['image'] = $this->uploadFiles('our_services',$request->file('image'),null );
        OurService::create($data);
        Cache::forget('our_services');
        return response()->json(1,200);

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
    public function edit(Request $request , $id)
    {
        if ($request->ajax()){
            $returnHTML = view("admin.crud.our_services.parts.edit_form")
                ->with([
                    'obj' =>OurService::findOrFail($id),
                    'languages'=>Language::where('is_active','active')->get(),
                ])
                ->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $slider = OurService::findOrFail($id);
        $data = $this->validate($request,[
            'image'=>'nullable|file|image',
            'title'=>'required|array',
            'title.*'=>'required',
            'desc'=>'required|array',
            'desc.*'=>'required',
        ]);
        try{
            if ($request->hasFile('image')){
                $data ['image'] = $this->uploadFiles('our_services',$request->file('image'),$slider->image );
            }else{
                $data ['image'] = $slider->image;
            }
            $name = [];
            $desc = [];
            foreach (Language::where('is_active','active')->get() as $index=>$language){
                $name[$language->title] = $request->title[$index];
                $desc[$language->title] = $request->desc[$index];
            }
            $data['title'] = $name;
            $data['desc'] = $desc;
            $slider->update($data);
            Cache::forget('our_services');
            return response()->json(1,200);
        }catch (\Exception $exception){
            return response()->json($exception->getMessage(),500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return response()->json(OurService::destroy($id),200);
        $deleted = OurService::destroy($id);

        Cache::forget('our_services');

        return response()->json($deleted, 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete_all(Request $request)
    {
        OurService::destroy($request->id);
        Cache::forget('our_services');
        return response()->json(1,200);
    }


}//end
