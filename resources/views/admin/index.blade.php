@extends('admin.app')
@section('content')
    <div class="container-fluid" class="row" >
        <div class="row">

            <div class="col-lg-4"  >

                <button type="button" class="btn btn-light btn-lg btn-block"><a class="nav-link" href="{{ url('/register') }}"><h4><b>Добавить админа/модератора</b></h4></a></button>
                <button type="button" class="btn btn-light btn-lg btn-block"><a class="nav-link" href="{{ url('/type_complain') }}"><h4><b>Добавить тип жалоб</b></h4></a></button>
            </div>
            <div class="col-lg-8"  >


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Имя </th>
            <th scope="col">@ e_mail</th>
            <th scope="col">роль</th>
            <th scope="col"></th>
        </tr>
        </thead>
        @foreach($users as $users)
        <tbody>
        <tr>
            <th scope="row">{{$users->id
            }}</th>
            <td>{{$users->name}}</td>
            <td>{{$users->email}}</td>
            <td  ></td>
            <td> {!! Form::open (['method' => 'DELETE','action'  =>['AdminController@destroy',$users->id]]) !!}
                {!! Form::submit('Удалить!',['class' => 'btn btn-danger'])!!}
                {!! Form::close() !!}</td>

        </tr>

        </tbody>
            @endforeach
    </table>


@endsection