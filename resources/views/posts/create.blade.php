@extends('layouts.app')

@section('content')
<div class="col-md-8 bg-white">
    <h2 class="my-4">أضف موضوع جديد</h2>
    @include('alerts.success')
    <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
         @csrf
        <div class="form-group">
            <select class="form-control" name="category_id">
              @include('lists.categories')
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="حدد عنوان الموضوع" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <textarea class="form-control summernote" name="body" rows="3" placeholder="محتوى الموضوع" >{{old('text')}}</textarea>
        </div>
        <div class="form-group">
            <label for="details"> اختر صورة تتعلق بالموضوع </label>
            <input type="file" name="image"  class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">أرسل </button>
     </form>
</div>

@include('partials.sidebar')

@endsection
