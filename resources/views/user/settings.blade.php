@extends('layouts.app')
@section('content')

<div class="container">
    <h4 class="">تعديل البيانات الشخصية</h4><hr>
    @include('alerts.success')
    <form method="POST" action="{{route('settings')}}" enctype="multipart/form-data">
        @csrf
        <div class="row bg-white p-5">
            <div class="col-lg-4 text-center mb-5">
                <img id="avatar_img" src="{{ $user->profile->avatar ?? asset('storage/avatars/avatar.png') }}" class="profile mb-2 border" alt="avatar">
                <input type="file" id="avatar_file" name="avatar_file" class="d-none">
            </div>

            <div class="col-lg-8">
                <div class="form-group row">
                    <label class="col-lg-3">اسم المستخدم </label>
                    <div class="col-lg-9">
                        <input class="form-control" name="name" type="text" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3" id="email">البريد الإلكتروني</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="email" type="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3" id="website">الموقع الإلكتروني</label>
                    <div class="col-lg-9">
                        <input class="form-control" name="website" type="text" value="{{ optional($user->profile)->website }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bio" class="col-lg-3" >النبذة الشخصية:</label>
                    <div class="col-lg-9">
                        <textarea class="form-control" rows="5" name="bio">{{ optional($user->profile)->bio }}</textarea>
                    </div>
                </div>  
                <div class="form-group row" >
                    <div class="col-lg-9">
                        <input type="submit" class="btn btn-primary" value="حفظ التعديلات ">
                        <input type="reset" class="btn btn-secondary mt-3 mt-sm-0" value="إلغاء">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')

<script>
    $(document).ready(function(){

        $('#avatar_img').click(function() {
            $("input[id='avatar_file']").click();
        });


         $("#avatar_file").change(function(){
            var reader = new FileReader();
            reader.onload = function()
            {
                $("#avatar_img").addClass("avatar_preview").attr("src", reader.result);
            }
            reader.readAsDataURL(event.target.files[0]);
        });

    });
</script>
@endsection

