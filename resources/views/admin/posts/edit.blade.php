@extends('admin.template')

@section('breadcrumb')
         تعديل منشور
@endsection

@section('content')
    <div class="container-fluid">
      <div class="card mb-3">
       @include('alerts.success')
        <div class="card-header">
          <i class="fa fa-table"></i>  تعديل منشور
        </div>
        <div class="card-body">
          <div class="container">
            <form method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
                @csrf
                @method('Patch')
                <div class="form-row">
                    <div class="col-lg-5 form-group">
                        <label for="title">عنوان الموضوع</label>
                        <input type="text" class="form-control" name="title"  value="{{$post->title}}">
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="category_id">التصنيف </label>
                        <select class="form-control" name="category_id">
                            @include('lists.categories')
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-5 form-group">
                        <label for="slug">الإسم اللطيف </label>
                        <input type="text" class="form-control" name="slug" placeholder="" value="{{$post->slug}}">
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="approved">نشر الموضوع </label>
                        <input type="checkbox" class="" name="approved"  value="{{$post->approved}}" {{$post->approved ? 'checked' : ''}}>
                    </div>
                </div>

                <div class="col-lg-12 form-group">
                    <label for="image"> اختر صورة تتعلق بالموضوع </label>
                    <img name="img"  class="form-control w-25 h-25" src="{{$post->image_path}}">
                    <input type="file" name="image"  class="form-control">
                </div>

                <div class="col-lg-12 form-group">
                    <label for="body"> المحتوى </label>
                    <textarea class="form-control col" name="body" rows="3"  >{{$post->body}}</textarea>
                </div>

                <div class="col-lg-12 form-group">
                    <button type="submit" class="btn btn-primary mt-3">تحديث </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')

@endsection