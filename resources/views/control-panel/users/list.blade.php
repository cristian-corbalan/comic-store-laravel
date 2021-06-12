@extends('layouts.control-panel')

@section('sectionTitle', 'Usuarios')

@section('contentClass', 'users-list')

@section('content')

    <div class="table-container-all">
        <header>
            <h2>Listado de usuarios</h2>
        </header>

        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th title="Foto de perfil">F.P</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>
                            <div class="img-container">
                                <img
                                    src="{{asset('storage/img/' . $user->profileImg->src)}}"
                                    alt="{{$user->profileImg->src}}">
                            </div>
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
