<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

<style>
    .select2-container {
        z-index: 9999;
    }
</style>

<form action="{{route('admins.store')}}" method="post" id="Form">
    @csrf

    <div class="row ">

        <div class="col-12 ">
            <div class="form-group">
                <label for="address1">الصورة </label>
                <input data-validation="required" type="file" data-default-file="" class="form-control dropify"
                       id="image" name="image">
            </div>
        </div>

        <div class="col-md-6 p-2 pt-3">
            <div class="form-group">
                <label for="name">الإسم </label>
                <input data-validation="required" type="text" class="form-control" id="name" name="name"
                       placeholder="الاسم ">
            </div>
        </div>

        <div class="col-md-6 p-2 pt-3">
            <div class="form-group">
                <label for="email">البريد الالكترونى </label>
                <input data-validation="required,email" type="text" class="form-control" id="email" name="email"
                       placeholder="البريد الالكترونى ">
            </div>
        </div>

        <div class="col-md-6 p-2 pt-3">
            <div class="form-group">
                <label for="email2">كلمة المرور</label>
                <input data-validation="required" type="password" class="form-control" id="password" name="password"
                       placeholder="كلمة المرور">
            </div>
        </div>

        <div class="col-md-6 p-2 pt-3">
            <div class="form-group">
                <label for="phone">رقم الهاتف</label>
                <input data-validation="required" type="number" class="form-control" id="phone" name="phone"
                       placeholder=" ">
            </div>
        </div>


        <div class="col-md-4 p-2 pt-3">
            <div class="form-group">
                <label for="email2">النوع </label>
                <select data-validation="required" name="admin_type" class="form-control">
                    <option value="0" selected>مدير</option>
                    <option value="1">موظف خدمة العملاء</option>
                </select>
            </div>
        </div>
        <div class=" col-md-4 p-2 pt-3">
            <div class="form-group">
                <label for="email2">الادوار </label>
                <select name="roles[]" multiple class="form-control js-example-basic-multiple">
                    @foreach(\App\Models\Role::get() as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-4 p-2 pt-3">
            <div class="form-group">
                <label for="phone">الواتساب</label>
                <input data-validation="required" type="text" class="form-control" id="whats_up_number"
                       name="whats_up_number" placeholder=" ">
            </div>
        </div>
        <div class="col-md-4 p-2 pt-3">
            <div class="form-group">
                <label for="branch">الفرع</label>
                <select data-validation="required" name="branch" id="branch" class="form-control">
                    <option value="all_branches">كل الفروع</option>
                    <option value="riyadh">الرياض</option>
                    <option value="jeddah">جدة</option>
                    <option value="yanbu">ينبع</option>
                    <option value="r_y">الرياض وينبع</option>
                    <option value="y_j">ينبع وجدة</option>
                    <option value="j_r">جدة والرياض</option>
                </select>
            </div>
        </div>


    </div>
</form>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>
