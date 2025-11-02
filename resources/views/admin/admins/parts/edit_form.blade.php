<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

<style>
    .select2-container {
        z-index: 9999;
    }
</style>
<form action="{{route('admins.update',$admin->id)}}" method="post" id="Form">
    @csrf
    @method('PUT')

    {{--form--}}
    <div class="row ">
        <div class="col-12">
            <div class="form-group">
                <label for="address1">الصورة </label>
                <input type="file" data-default-file="{{get_file($admin->image)}}" class="form-control dropify"
                       id="image" name="image">
            </div>
        </div>

        <div class=" col-md-6 p-2 pt-3">
            <div class="form-group">
                <label for="name">الإسم </label>
                <input data-validation="required" type="text" class="form-control" id="name" name="name"
                       value="{{$admin->name}}" placeholder="الاسم ">
            </div>
        </div>
        <div class=" col-md-6 p-2 pt-3">
            <div class="form-group">
                <label for="email">البريد الالكترونى </label>
                <input data-validation="required,email" type="text" class="form-control" id="email"
                       value="{{$admin->email}}" name="email" placeholder="البريد الالكترونى ">
            </div>
        </div>
        <div class=" col-md-6 p-2 pt-3">
            <div class="form-group">
                <label for="email2">كلمة المرور</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور">
            </div>
        </div>
        <div class=" col-md-6 p-2 pt-3">
            <div class="form-group">
                <label for="phone">رقم الهاتف</label>
                <input data-validation="required" value="{{$admin->phone}}" type="number" class="form-control"
                       id="phone" name="phone" placeholder=" ">
            </div>
        </div>
        <div class=" col-md-4 p-2 pt-3">
            <div class="form-group">
                <label for="email2">النوع </label>
                <select data-validation="required" name="admin_type" class="form-control">
                    <option value="0" {{($admin->admin_type =="0")? "selected":""}}>مدير</option>
                    <option value="1" {{($admin->admin_type =="1")? "selected":""}}>موظف خدمة العملاء</option>
                </select>
            </div>
        </div>

        <div class=" col-md-4 p-2 pt-3">
            <div class="form-group">
                <label for="email2">الادوار </label>
                <select name="roles[]" multiple class="form-control select2">
                    @foreach(\App\Models\Role::get() as $role)
                        <option @foreach($admin->roles as $rol)  @if($rol->id==$role->id) selected
                                @endif @endforeach value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class=" col-md-4 p-2 pt-3">
            <div class="form-group">
                <label for="whats_up_number">الواتساب</label>
                <input data-validation="required" value="{{$admin->whats_up_number}}" type="text" class="form-control"
                       id="whats_up_number" name="whats_up_number" placeholder=" ">
            </div>
        </div>
        <div class=" col-md-4 p-2 pt-3">
            <div class="form-group">
                <label for="branch">الفرع</label>
                <select data-validation="required" name="branch" id="branch" class="form-control">
                    <option value="all_branches" {{ $admin->branch == "all" ? "selected" : "" }}>كل الفروع</option>
                    <option value="jeddah" {{ $admin->branch == "jeddah" ? "selected" : "" }}>جدة</option>
                    <option value="yanbu" {{ $admin->branch == "yanbu" ? "selected" : "" }}>ينبع</option>
                    <option value="riyadh" {{ $admin->branch == "riyadh" ? "selected" : "" }}>الرياض</option>
                    <option value="r_y" {{ $admin->branch == "r_y" ? "selected" : "" }}>الرياض وينبع</option>
                    <option value="y_j" {{ $admin->branch == "y_j" ? "selected" : "" }}>ينبع وجدة</option>
                    <option value="j_r" {{ $admin->branch == "j_r" ? "selected" : "" }}>جدة والرياض</option>
                </select>
            </div>
        </div>




    </div>
    {{--form--}}
</form>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
