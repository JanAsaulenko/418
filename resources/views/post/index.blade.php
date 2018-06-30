@extends('layout.app')

@section('title', 'Home')

@section('content')
  <div class="pen-title">
    <h1>ВС! СКАРГИ</h1>
  </div>
  <div class="row">
    @foreach($posts as  $post)
      <div class="col-md-6">
        @include('post._card', ['post' => $post])
      </div>
    @endforeach
  </div>
@endsection
