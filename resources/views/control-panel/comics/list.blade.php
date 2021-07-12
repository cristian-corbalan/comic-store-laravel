@php
    /** @var array $formParams */
@endphp

@extends('layouts.control-panel')

@section('sectionTitle', 'Comics')

@section('contentClass', 'comic-list')

@section('content')
    <p class="btn-rounded">
        <a href="{{route('control-panel.comics.form')}}" class="icon-only">
            <span class="icon-add"></span>
            Añadir un nuevo comic
        </a>
    </p>

    <div class="table-container-all">
        <header>
            <h2 class="sr-only">Listado de comics</h2>
            <form action="{{route('control-panel.comics.list')}}" class="search-form">
                <div class="field has-addons">
                    <div class="control">
                        <label for="search-input" class="sr-only">Buscar un comic</label>

                        <input
                            class="input"
                            type="text"
                            name="title"
                            id="search-input"
                            placeholder="Buscar un comic"
                            value="{{ $formParams['title'] ?? null }}"/>
                    </div>
                    <div class="control">
                        <button class="button">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
            @if($comics->lastPage() > 1)
                <x-general.pagination :items="$comics"></x-general.pagination>
            @endif
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
                                <li><a href="{{route('control-panel.comics.edit',['comic' => $comic->id])}}"
                                       class="icon-only"><span class="icon-edit"></span>Editar</a></li>

                                <li>
                                    <form action="{{route('comics.delete', ['comic' => $comic->id])}}" method="POST">
                                        @csrf

                                        @method('DELETE')

                                        <button type="submit" class="icon-only">
                                            <span class="icon-trash"></span>
                                            <span class="icon-trash-open"></span>
                                            Eliminar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
