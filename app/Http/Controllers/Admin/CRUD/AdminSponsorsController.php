<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Traits\Upload_Files;
use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;



class AdminSponsorsController extends Controller
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

        if ($request->ajax()) {
            $dataTables = Sponsor::query()->latest();

            return DataTables::of($dataTables)
                ->editColumn('image', function ($row) {
                    return ' <img src="'.get_file($row->image).'" class=" rounded" style="height:50px;width:50px"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d',strtotime($row->created_at));
                })
                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->addColumn('actions', function ($row) {
                    return "<button  class='btn btn-info editButton' id='" . $row->id . "'> <i class='fa fa-edit'></i></button>
                   <button class='btn btn-danger  delete' id='" . $row->id . "'><i class='fa fa-trash'></i> </button>";
                })
                ->rawColumns(['actions', 'image', 'delete_all'])->make(true);
        }
        return view('admin.crud.sponsors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()){
            $returnHTML = view("admin.crud.sponsors.parts.add_form")/*->with([
                'languages'=>Language::where('is_active','active')->get(),
            ])*/->render();
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
            /* 'title'=>'required|array',
            'title.*'=>'required',*/
           /* 'desc'=>'required|array',
            'desc.*'=>'required',*/
        ]);
        //$data = $request->only(['from','to']);
        /*$name = [];
        foreach (Language::where('is_active','active')->get() as $index=>$language){
            $name[$language->title] = $request->title[$index];
        }
        $data['title'] = $name;*/
        $data ['image'] = $this->uploadFiles('our_services',$request->file('image'),null );
        Sponsor::create($data);
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
            $returnHTML = view("admin.crud.sponsors.parts.edit_form")
                ->with([
                    'obj' =>Sponsor::findOrFail($id),
                 /*   'languages'=>Language::where('is_active','active')->get(),*/
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
        $obj = Sponsor::findOrFail($id);
        $data = $this->validate($request,[
            'image'=>'nullable|file|image',
           /* 'title'=>'required|array',
            'title.*'=>'required',*/
           /* 'desc'=>'required|array',
            'desc.*'=>'required',*/
        ]);
        try{
            if ($request->hasFile('image')){
                $data ['image'] = $this->uploadFiles('our_services',$request->file('image'),$obj->image );
            }else{
                $data ['image'] = $obj->image;
            }
            /*$name = [];
            $desc = [];
            foreach (Language::where('is_active','active')->get() as $index=>$language){
                $name[$language->title] = $request->title[$index];
                $desc[$language->title] = $request->desc[$index];
            }
            $data['title'] = $name;
            $data['desc'] = $desc;*/
            $obj->update($data);
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
        return response()->json(Sponsor::destroy($id),200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete_all(Request $request)
    {
        Sponsor::destroy($request->id);
        return response()->json(1,200);
    }


}//end
