<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class AdminBlogsController extends Controller
{
    public function index(Request $request)
    {
        if (!checkPermission(44))
            return view('admin.permission');

        if ($request->ajax()) {
            $blogs = Blog::latest();

            return DataTables::of($blogs)
               ->editColumn('image', function ($row) {
                    return '<img src="'.asset($row->image).'" style="width:70px;height:70px;object-fit:contain;" onclick="window.open(this.src)">';
                })
                ->editColumn('second_image', function ($row) {
                    return '<img src="'.asset($row->second_image).'" style="width:70px;height:70px;object-fit:contain;" onclick="window.open(this.src)">';
                })
                ->editColumn('featured_image', function ($row) {

                    if (!$row->featured_image) {
                        return '<span class="badge bg-secondary">لا يوجد صورة</span>';
                    }

                    return '
                        <img
                            src="'.asset($row->featured_image).'"
                            style="width:70px;height:70px;object-fit:contain;cursor:pointer"
                            onclick="window.open(this.src)"
                        >
                    ';
                })
                ->editColumn('status', function ($row) {
                    return $row->status ? '<span class="badge bg-success">نشط</span>' :
                        '<span class="badge bg-danger">مخفي</span>';
                })
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d', strtotime($row->created_at));
                })
                ->addColumn('featured', function ($row) {
                    return $row->is_featured
                        ? '<span class="badge bg-warning">مميز</span>'
                        : '<span class="badge bg-danger">غير مميز</span>';
                })
                ->addColumn('views', function ($row) {
                    return $row->views;
                })
                ->addColumn('delete_all', function ($row) {
                    return '<input type="checkbox"
                            class="delete-all form-check-input"
                            data-status="'.$row->status.'"
                            value="'.$row->id.'">';
                })
                ->addColumn('actions', function ($row) {
                    return "
                        <button class='btn btn-info editButton' id='{$row->id}'><i class='fa fa-edit'></i></button>
                        <button class='btn btn-danger delete' id='{$row->id}'><i class='fa fa-trash'></i></button>
                    ";
                })
                ->rawColumns(['image','second_image','featured_image','status','actions','featured','delete_all'])
                ->make(true);
        }

        return view('admin.crud.blogs.index');
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            $html = view('admin.crud.blogs.parts.add_form')->render();
            return response()->json(['success'=>true,'html'=>$html]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
            'image'         => 'required|image',
            'second_image'  => 'required|image',
            'featured_image' => 'nullable|image'
        ]);

        if ($request->has('is_featured')) {
            Blog::where('is_featured', 1)->update(['is_featured' => 0]);
        }

        $imagePath = null;
        $secondImagePath = null;
        $featuredImagePath = null;

        if ($request->hasFile('image')) {
            $imageName = time().'_1.'.$request->image->extension();
            $request->image->move(public_path('frontend/img/blogs'), $imageName);
            $imagePath = 'frontend/img/blogs/'.$imageName;
        }

        if ($request->hasFile('second_image')) {
            $imageName2 = time().'_2.'.$request->second_image->extension();
            $request->second_image->move(public_path('frontend/img/blogs'), $imageName2);
            $secondImagePath = 'frontend/img/blogs/'.$imageName2;
        }

        if ($request->hasFile('featured_image')) {
            $img = time().'_featured.'.$request->featured_image->extension();
            $request->featured_image->move(public_path('frontend/img/blogs'), $img);
            $featuredImagePath = 'frontend/img/blogs/'.$img;
        }

        Blog::create([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'excerpt'       => $request->excerpt,
            'content'       => $request->content,
            'image'         => $imagePath,
            'second_image'  => $secondImagePath,
            'featured_image' => $featuredImagePath,
            'status'        => $request->status ?? 1,
            'is_featured'  => $request->has('is_featured'),
        ]);

        return response()->json(1,200);
    }

    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $blog = Blog::findOrFail($id);
            $html = view('admin.crud.blogs.parts.edit_form', compact('blog'))->render();
            return response()->json(['success'=>true,'html'=>$html]);
        }
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        if ($request->has('is_featured')) {
            Blog::where('id', '!=', $blog->id)
                ->where('is_featured', 1)
                ->update(['is_featured' => 0]);
        }

        if (!$request->has('is_featured') && $blog->featured_image) {
            unlink(public_path($blog->featured_image));
            $blog->featured_image = null;
        }

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path($blog->image)))
                unlink(public_path($blog->image));

            $img = time().'_1.'.$request->image->extension();
            $request->image->move(public_path('frontend/img/blogs'), $img);
            $blog->image = 'frontend/img/blogs/'.$img;
        }

        if ($request->hasFile('second_image')) {
            if ($blog->second_image && file_exists(public_path($blog->second_image)))
                unlink(public_path($blog->second_image));

            $img2 = time().'_2.'.$request->second_image->extension();
            $request->second_image->move(public_path('frontend/img/blogs'), $img2);
            $blog->second_image = 'frontend/img/blogs/'.$img2;
        }

        if ($request->hasFile('featured_image')) {
            if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
                unlink(public_path($blog->featured_image));
            }

            $img = time().'_featured.'.$request->featured_image->extension();
            $request->featured_image->move(public_path('frontend/img/blogs'), $img);
            $blog->featured_image = 'frontend/img/blogs/'.$img;
        }

        $blog->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'status'  => $request->status ?? 1,
            'is_featured'  => $request->has('is_featured'),
        ]);

        return response()->json(1,200);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && file_exists(public_path($blog->image)))
            unlink(public_path($blog->image));

        if ($blog->second_image && file_exists(public_path($blog->second_image)))
            unlink(public_path($blog->second_image));

        $blog->delete();

        return response()->json(1,200);
    }

    public function delete_all(Request $request)
    {
        Blog::whereIn('id',$request->id)->delete();
        return response()->json(1,200);
    }

    public function bulkToggle(Request $request)
    {
        $ids = $request->ids;
        $action = $request->action;

        if ($action === 'show') {
            Blog::whereIn('id', $ids)->update(['status' => 1]);
        } elseif ($action === 'hide') {
            Blog::whereIn('id', $ids)->update(['status' => 0]);
        } else {
            // toggle
            Blog::whereIn('id', $ids)->get()->each(function ($blog) {
                $blog->update(['status' => !$blog->status]);
            });
        }

        return response()->json(['success' => true]);
    }

}
