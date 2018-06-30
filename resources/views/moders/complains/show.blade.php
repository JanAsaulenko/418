
@extends('layout.app')


        <!DOCTYPE html>
<html lang="en">


@section('title', 'Form')

@section('content')

    <div class="container">
        <h1><small>  скаргa {{$complain->id}}</small></h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col" class="tdtxt">Заголовок скарги</th>
                <th scope="col" class="tdtxt">Текст скарги</th>
                <th scope="col" class="tdtxt">Ім'я скаржника </th>
                <th scope="col" class="tdtxt">Зображення </th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>


                <tr>
                    <td class="tdtxt">
                        <div>{{$complain->title}}</div>
                    </td>
                    <td class="tdtxt">
                        <div>{{$complain->comments}}</div>
                    </td>
                    <td class="tdtxt">
                        <div>{{$complain->username}}</div>
                    </td>
                    <td class="tdtxt">
                        <img id="myImg" class="img-fluid rounded mb-3 mb-md-0" src="{{$complain->img}}" alt="Фото відсутнє" width="399" height="299">
                    </td>
                    <td class="tdtxt">
                        <a href="{{ url('moders/complains/' ) }}" type="link" class="btn btn-outline-success btn-sm" >До списку скарг</a>
                    </td>

                </tr>

            </tbody>
        </table>

    </div>




@endsection