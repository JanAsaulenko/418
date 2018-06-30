@extends('layout.app')


        <!DOCTYPE html>
<html lang="en">
@section('title', 'Form')
{{--<head>--}}
{{--<style>--}}

{{----}}
{{--</style>--}}
{{--</head>--}}
@section('content')

    <h1>Сторінка редагування скарга № {{ $complain->id }}</h1>

    {{ Form::open(array('url' => 'moders/complains/'. $complain->id, 'enctype' => 'multipart/form-data', 'method' => 'PUT')) }}

    <div class="row">

        <div class="col-md-4 form-group">
            {{ Form::label('created_at', "Дата створення", ['class' => 'control-label']) }}
            {{ Form::date('created_at', $complain->created_at, [
                'class' => $errors->has('created_at') ? 'has-error' : "",
            ]) }}
            {{ Form::label('title', "Заголовок скарги", ['class' => 'control-label']) }}
            {{ Form::text('title', $complain->title, [
                'class' => $errors->has('title') ? 'has-error' : "",
            ]) }}
            {{ Form::label('username', "Ім'я  користувача", ['class' => 'control-label']) }}
            {{ Form::text('username', $complain->username, [
                'class' => $errors->has('username') ? 'has-error' : "",
            ]) }}
            {{ Form::label('comments', "Текст скарги", ['class' => 'control-label']) }}
            {{ Form::textarea('comments', $complain->comments, [
                'row' => '7', 'class' => 'form-control'
            ]) }}
        </div>
        <div class="col-md-6 form-group " >
            <img id="myImg" class="img-fluid rounded mb-3 mb-md-0" src="{{$complain->img}}" alt="Фото відсутнє" style="max-height: 370px">
            {{--width="399" height="299"--}}
            {{--<img id="myImg" class="img-fluid rounded mb-3 mb-md-0" src="/images/body_bg.jpg" alt="Фото комплейна">--}}
        </div>
        {{--<div class="col-md-4" class="form-group">--}}
        {{--{{ Form::label('#', "Перелік прикріплених фото", ['class' => 'control-label']) }}--}}
        {{--@foreach($fotos as $key => $foto)--}}
        {{--<option value="{{ $key }} "> {{ $foto }} </option>--}}
        {{--@endforeach--}}
        {{--{{ Form::select('foto', $foto ) }}--}}
        {{--</div>--}}
        <div class="col-md-2" class="form-group">
            {{ Form::label('image', "Дадати/змінити фото скарги", ['class' => 'control-label']) }}
            {{ Form::file('image', array('class' => 'image')) }}


            {{ Form::submit('Зберегти', array('class' => 'btn btn-success btn btn-block')) }}


            <a href="{{ url('moders/complains/' ) }}" type="link" class="btn btn-primary btn-block" >До списку скарг</a>
            {{ Form::close() }}



            {!! Form::open(['method' => 'DELETE','route' => ['complains.destroy', $complain->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Видалити', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
        </div>

    </div>

    <div id="myModal" class="modal">
        <span class="closed">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    <script>
        var modal = document.getElementById('myModal');


        var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }


        var span = document.getElementsByClassName("closed")[0];


        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>

@endsection
