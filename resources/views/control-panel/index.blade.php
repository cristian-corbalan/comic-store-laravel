@extends('layouts.control-panel')


@section('content')
    <div class="welcome">
        <div class="content">
            <p>¡Hola "Nombre Apellido"!</p>
            <p>Nos alegra verte por aquí, ahora te explicare un poco de este lugar</p>
            <p>Desde esta pantalla puedes ver el historial de acciones que se realizaron en el sitio web, o añadir algo
                nuevo a la tienda.</p>
            <p>También puedes acceder a distintas secciones para ver un listado todos los contenido que tiene la
                tienda.</p>
        </div>

        <div class="img-container">
            <img src="{{url('img/illustrations/welcome_men.svg')}}"
                 alt="Hombre sentado frente a un ordenador mientras esta saludando">
        </div>
    </div>

    <div class="buttons-section">
        <ul>
            <li>
                <a href="#" class="button">
                    Añadir un nuevo comic
                    <span class="icon-add-rounded"></span>
                </a>
            </li>
            <li>
                <a href="#" class="button">
                    Redactar una nueva entrada
                    <span class="icon-add-rounded"></span>
                </a>
            </li>
        </ul>
    </div>

    <div class="history">
        <header>
            <h2>Historial</h2>
            <a href="#" class="button is-small is-uppercase">Ver todo</a>
        </header>
        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Acción</th>
                </tr>
                </thead>

                <tbody>
                @foreach($history as $action)
                    <tr>
                        <td>
                            <div class="img-container">
                                <img
                                    src="{{asset('storage/img/' . $action->user->profileImg->src)}}"
                                    alt="{{$action->user->profileImg->src}}">
                            </div>

                            {{$action->user->name}} {{$action->user->last_name}}
                        </td>
                        <td>{{$action->action}}</td>
                    </tr>
                @endforeach
                <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
