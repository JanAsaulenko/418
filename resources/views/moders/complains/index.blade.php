
@extends('layout.app')


        <!DOCTYPE html>
<html lang="en">


@section('title', 'Form')



@section('content')



    <!-- Main content -->

         <a href="{{ url('moders/complains/' ) }}" type="link" class="btn btn-outline-success btn-sm" >До списку всіх скарг</a>
        <a href="?confirmed=1" type="link" class="btn btn-outline-success btn-sm" >До списку незатверджених скарг</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col" class="tbtxt">Заголовок скарги</th>
                <th scope="col" class="tbtxt">Текст скарги</th>
                <th scope="col" class="tbtxt">Ім'я скаржника </th>
                <th scope="col" class="tbtxt">Стан затвердження </th>
                <th scope="col" class="tbtxt">Наявність фото </th>
                <th scope="col" class="tbtxt"> </th>
                <th scope="col" class="tbtxt"> </th>
                <th scope="col" class="tbtxt"> </th>
                <th scope="col" class="tbtxt"> </th>

            </tr>
            </thead>
            <tbody>
            @foreach($complains as $complain)

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

                        <div>{{($complain->confirmed == 1) ? "Затверджена" : "НE затверджена!" }}</div>
                    </td>
                    <td scope="col" class="tdtxt" >
                        <div >{{($complain->img) ? "Фото присутнє" : "Фото відсутнє"}}</div>
                    </td>
                    <td class="tdtxt">
                        <form action="{{ url('moders/complains/'. $complain->id ) }}" method="POST">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <button type="submit" name="confirmed" class="btn btn-outline-success btn-sm" >
                                <i class="far fa-save"></i>
                            </button>
                        </form>
                    </td>
                    <td class="tdtxt">
                        <a href="{{ url('moders/complains/' . $complain->id . '/edit') }}" type="link" class="btn btn-outline-success btn-sm" >
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td class="tdtxt">
                        <a href="{{ url('moders/complains/' . $complain->id ) }}" type="link" class="btn btn-outline-success btn-sm" >
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td class="tdtxt">

                        <form action="{{url('moders/complains/' . $complain->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $complains->links( "pagination::bootstrap-4") }}
    </div>




@endsection