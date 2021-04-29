@extends('admin.template')

@section('breadcrumb')
         إنشاء صفحة جديدة 
@endsection

@section('content')
    <div class="container-fluid">
      <div class="card mb-3">
      @include('alerts.success')
        <div class="card-header">
          <i class="fa fa-table"></i>  
        </div>
        <div class="card-body">
          <div class="container">
            <form method="POST" action="{{route('page.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-5 form-group">
                    <label for="title">عنوان الصفحة </label>
                    <input type="text" class="form-control" name="slug"  value="" placeholder="مثال: About">
                </div>

                <div class="col-lg-5 form-group">
                    <label for="title"> الوصف </label>
                    <input type="text" class="form-control" name="title"  value="" placeholder="مثال: نبذة عنا ">
                </div>

                <div class="col-lg-12 form-group">
                    <label for="body"> المحتوى </label>
                    <textarea name="content" class="form-control summernote"></textarea>
                </div>

                <div class="col-lg-12 form-group">
                    <button type="submit" class="btn btn-primary mt-3">إنشاء </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    

<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>

@endsection