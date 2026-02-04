<form action="{{ route('blogs.store') }}" method="post" id="Form" enctype="multipart/form-data">
    @csrf

    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label class="form-control-label">الصورة الأساسية</label>
                <input type="file" class="dropify" name="image"
                       accept="image/png, image/gif, image/jpeg,image/jpg" />
                <span class="form-text text-danger text-center">
                    مسموح فقط بالصيغ التالية : png, gif, jpeg, jpg
                </span>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label class="form-control-label">الصورة الثانية</label>
                <input type="file" class="dropify" name="second_image"
                       accept="image/png, image/gif, image/jpeg,image/jpg" />
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label>عنوان المقال</label>
                <input data-validation="required"
                       type="text"
                       class="form-control"
                       name="title"
                       placeholder="عنوان المقال">
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label>الحالة</label>
                <select name="status" class="form-control">
                    <option value="1">نشط</option>
                    <option value="0">مخفي</option>
                </select>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="featured-box">
                <div class="featured-info">
                    <div class="featured-icon">
                        <i class="mdi mdi-star"></i>
                    </div>

                    <div>
                        <h6>مقال مميز</h6>
                        <p>سيتم عرض هذا المقال في أعلى الصفحة كمقال مميز</p>
                    </div>
                </div>

                <label class="switch">
                    <input type="checkbox"
                        name="is_featured"
                        value="1"
                        {{ isset($blog) && $blog->is_featured ? 'checked' : '' }}>
                    <span class="slider"></span>
                </label>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 featured-image-box"
            style="display: {{ isset($blog) && $blog->is_featured ? 'block' : 'none' }};">
            <div class="form-group">
                <label class="form-control-label">صورة المقال المميز</label>
                <input type="file"
                    class="dropify"
                    name="featured_image"
                    @if(isset($blog) && $blog->featured_image)
                        data-default-file="{{ asset($blog->featured_image) }}"
                    @endif
                    accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label>وصف مختصر</label>
                <input type="text"
                       class="form-control"
                       name="excerpt"
                       placeholder="وصف مختصر للمقال">
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label>محتوى المقال</label>
                <textarea
                    data-validation="required"
                    rows="6"
                    class="form-control"
                    name="content"
                    id="editor"
                    placeholder="محتوى المقال">
                </textarea>
            </div>
        </div>

    </div>
</form>

<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
</script>
<script>
document.getElementById('Form').addEventListener('submit', function () {
    if (CKEDITOR.instances.editor) {
        CKEDITOR.instances.editor.updateElement();
    }
});
</script>
