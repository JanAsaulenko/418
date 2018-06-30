@extends('layout.app')

@section('title', 'Form')
@section('content')
  <div class="row">
    <div class="col">
      <div class="pen-title">
        <div class="row">
          @if(Session::has('Sucsess'))
            <div class="alert alert-success"><em> {!! session('Sucsess') !!}</em></div>
          @endif
        </div>
        <h1>Форма заполнения</h1>

      </div>
      <!-- Form Module-->
      <div class="module form-module">
        <div class="form container-fluid">
          {{ Form::model($post, ['url' => 'posts', 'method' => 'post']) }}
          @csrf
          {{ Form::hidden('lat', null, ['id' => 'lat']) }}
          {{ Form::hidden('lng', null, ['id' => 'lng']) }}
          <div class="row">
            <div class="col-md-8">
              <div id="map" class="{{ $errors->has('map') ? 'has-error' : '' }}"></div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                {!! Form::label('image', 'Image:')!!}
                {!! Form::file('img',['class' => 'form-control'])!!}
              </div>
              {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
              {{ Form::text('title', null, [
                  'class' => $errors->has('title') ? 'has-error' : '',
              ]) }}

              {{ Form::label('username', 'Username', ['class' => 'control-label']) }}
              {{ Form::text('username',null , [
                  'class' => $errors->has('username') ? 'has-error' : "",
              ]) }}

              {{ Form::label('comments', 'Comments', ['class' => 'control-label']) }}
              {{ Form::textarea('comments', null, [
                  'row' => '5', 'class' => 'post'
              ]) }}
            </div>
          </div>

          <div class="row">
            <div class="col-md">
              @if ($errors->any())
                <div class="alert alert-danger" >
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
            </div>
          </div>
          <div class="row">
            <button type="submit">Submit</button>
          </div>

          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
@endsection