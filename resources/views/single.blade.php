
@extends('layouts.master')
@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-10 mx-auto">
    <br>
    <div>
    <h3 class="mt-4">H1</h3>
    <span>{{ $post->h1 }}</span>
    <hr>
    <h3 class="mt-4">Intro</h3>
    <span>{{ $post->intro }} </span>
    <hr>
    <h3 class="mt-4">Timetable</h3>
    <span>{{ $post->timetable }} </span>
    <hr>
    <br>
</div>
@auth
<Comments 
    :post-id='@json($post->id)' 
    :user-name='@json(auth()->user()->name)'>
</Comments>
@endauth
</div>
</div>
</div>

@endsection