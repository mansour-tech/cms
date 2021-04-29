@extends('layouts.app')

@section('content')
<div class="container text-muted">
    <div class="row  bg-white p-3 mb-4">
        <div class="col-md-3 text-center">                      
            <img class="profile mb-2 border " src="{{$contents->profile->avatar ?? asset('storage/avatars/avatar.png')  }}" alt="" />
        </div>
        <div class="col-md-9 text-md-right text-center">
            <h2>{{$contents->name}}</h2>
            <p class="word-break">{{ optional($contents->profile)->bio}}</p>   
            <a href="{{$contents->profile->website ?? null }}">{{ $contents->profile->website ?? null}}</a>   
        </div>
    </div>
    <div class="row p-3">
        <div  class="col-md-12">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link {{ $contents->relationLoaded('posts') ? 'active' :'' }}" href="{{ route('getByUser',$contents->id) }}">المشاركات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $contents->relationLoaded('comments')? 'active' :'' }}" href="{{ route('getCommentsByUser',$contents->id) }}">التعليقات</a>
                </li>
            </ul>
        </div>
    </div>   
    @if ($contents->relationLoaded('posts')) {{--  شاهد درس عرض تعليقات المستخدم علشان تفتهم لك دالة في حالة إنك نسيتها--}}
        @include('user.posts')
    @else
        @include('user.comments')
    @endif
</div>
@endsection