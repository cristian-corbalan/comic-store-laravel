@extends('layouts.control-panel')

@section('sectionTitle', 'Comics')

@section('contentClass', 'comic-list')

@section('content')
    <p class="btn-rounded">
        <a href="#" class="icon-only">
            <span class="icon-add"></span>
            Añadir un nuevo comic
        </a>
    </p>

    <div class="table-container-all">
        <header>
            <h2>Listado de comics</h2>
        </header>

        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Stock</th>
                    <th>Marca</th>
                    <th>Géneros</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($comics as $comic)
                    <tr>
                        <td>{{$comic->id}}</td>
                        <td class="td-title">{{$comic->title}}</td>
                        @if($comic->discount)
                            <td>${{($comic->price - ($comic->price*$comic->discount/100))  / 100}}</td>
                        @else
                            <td>${{$comic->price / 100}}</td>
                        @endif
                        <td>{{$comic->discount ? $comic->discount . '%' : '-'}}</td>
                        <td>{{$comic->stock}}</td>
                        <td>{{$comic->brand->name}}</td>
                        <td>
                            @foreach($comic->genres as $genres)
                                <span class="tag is-dark">{{ $genres->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <ul>
                                <li><a href="#" class="icon-only"><span class="icon-edit"></span>Editar</a></li>
                                <li><a href="#" class="icon-only has-text-danger"><span class="icon-trash"></span>Eliminar</a></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
