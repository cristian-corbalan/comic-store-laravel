@extends('layouts.website')


@section('content')
    <main id="main-comic-list">
        <section id="filters" class="modal">
            <div class="modal-background filter-sh-btn"></div>

            <div class="modal-content">
                <p class="title is-4">Filtros</p>
                <p>Próximamente</p>
            </div>

            <button class="modal-close is-large filter-sh-btn" aria-label="close"></button>
        </section>

        <section id="comics-list">
            <header>
                <button class="button filter-sh-btn">
                    Filtros
                    <span class="icon-filter"></span>
                </button>
            </header>

            <h2 class="sr-only">Listado de comics</h2>

            <ul class="comic-list">
                @foreach($comics as $comic)
                    <li>
                        <x-comics.comic-product-item :comic="$comic"></x-comics.comic-product-item>
                    </li>
                @endforeach
            </ul>
        </section>
    </main>
@endsection
