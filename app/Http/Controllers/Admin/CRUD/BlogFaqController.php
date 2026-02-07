<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogFaq;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogFaqController extends Controller
{
    // عرض الأسئلة بالـ DataTable
    public function index(Request $request, Blog $blog)
    {
        if($request->ajax()){
            $faqs = $blog->faqs()->latest();

            return DataTables::of($faqs)
                ->addColumn('check', function($faq){
                    return '<input type="checkbox" class="delete-all form-check-input" value="'.$faq->id.'">';
                })
                ->addColumn('status', function($faq){
                    return $faq->status
                        ? '<span class="badge bg-success">نشط</span>'
                        : '<span class="badge bg-danger">مخفي</span>';
                })
                ->addColumn('actions', function($faq) use ($blog){
                    $editUrl = route('blogs.faqs.edit', [$blog->id, $faq->id]);
                    $deleteBtn = '<button data-id="'.$faq->id.'" class="btn btn-sm btn-danger deleteFaq">حذف</button>';
                    $editBtn = '<button data-id="'.$faq->id.'" class="btn btn-sm btn-primary editFaq">تعديل</button>';
                    return $editBtn.' '.$deleteBtn;
                })
                ->rawColumns(['check','status','actions'])
                ->make(true);
        }

        return view('admin.crud.blogs.faqs.index', compact('blog'));
    }

    // إظهار الفورم لإضافة سؤال
    public function create(Blog $blog)
    {
        $action = route('blogs.faqs.store', $blog->id);
        return response()->json(['html' => view('admin.crud.blogs.faqs.form', compact('action'))->render()]);
    }

    // إظهار الفورم لتعديل سؤال
    public function edit(Blog $blog, BlogFaq $faq)
    {
        $action = route('blogs.faqs.update', [$blog->id, $faq->id]);
        return response()->json(['html' => view('admin.crud.blogs.faqs.form', compact('faq','action'))->render()]);
    }

    // تخزين سؤال جديد
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);

        $blog->faqs()->create([
            'question'=>$request->question,
            'answer'=>$request->answer,
            'status'=>$request->status ?? 1,
        ]);

        return response()->json(['success' => true]);
    }

    // تحديث سؤال
    public function update(Request $request, Blog $blog, BlogFaq $faq)
    {
        $faq->update($request->only('question','answer','status'));
        return response()->json(['success' => true]);
    }

    // حذف سؤال
    public function destroy(Blog $blog, BlogFaq $faq)
    {
        $faq->delete();
        return response()->json(['success' => true]);
    }

    // حذف جماعي
    public function bulkDelete(Request $request, Blog $blog)
    {
        BlogFaq::whereIn('id', $request->ids)->delete();
        return response()->json(['success' => true]);
    }

    // تغيير الحالة جماعي
    public function bulkToggle(Request $request, Blog $blog)
    {
        $faqs = BlogFaq::whereIn('id', $request->ids)->get();
        foreach($faqs as $faq){
            $faq->status = !$faq->status;
            $faq->save();
        }
        return response()->json(['success' => true]);
    }
}
