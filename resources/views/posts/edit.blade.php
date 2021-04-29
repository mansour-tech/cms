@extends('layouts.app')

@section('content')
<div class="col-md-8 bg-white">
    <h2 class="my-4">تعديل مشاركة  </h2>
    @include('alerts.success')
    <form method="POST" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        {{-- <input type="hidden" name="_method" value="PATCH"> --}}
        <div class="form-group">
            <select class="form-control" name="category_id">
              @include('lists.categories')
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="حدد عنوان الموضوع" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="body" rows="3" placeholder="محتوى الموضوع" >{{$post->body}}</textarea>
        </div>
        <div class="form-group">
            <label for="details"> اختر صورة تتعلق بالموضوع </label>
            <img name="image"  class="form-control w-25 h-25" src="{{$post->image_path}}">
            <input type="file" name="image"  class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">تحديث </button>
     </form>
</div>

@include('partials.sidebar')

@endsection