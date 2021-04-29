@extends('layouts.app')

@section('content')
<div class="col-md-8 bg-white content">
    <h2 class="my-4"> {{ $page->title }} </h2>

    {!! $page->content !!} 
</div>

@include('partials.sidebar')

@endsection