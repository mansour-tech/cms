@extends('layouts.app')
@section('content')

<div class="col-md-8">
  @livewire('posts')
</div>
@include('partials.sidebar')

@endsection