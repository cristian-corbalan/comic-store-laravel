@extends('layouts.website')


@section('content')
    <main id="main-comic-list">
        <section id="filters" class="modal" data-name="filters-modal">
            <div
                class="modal-background filter-sh-btn"
                data-role="toggle"
                data-target="filters-modal"
                data-target-class="is-active"
                data-clip="true"></div>

            <div class="modal-content">
                <h2 class="title is-4">Filtros</h2>
                <p>Próximamente</p>
            </div>

            <button
                class="modal-close is-large filter-sh-btn"
                aria-label="close"
                data-role="toggle"
                data-target="filters-modal"
                data-target-class="is-active"
                data-clip="true"></button>
        </section>

        <section id="comics-list">
            <header>
                <button
                    class="button filter-sh-btn"
                    data-role="toggle"
                    data-target="filters-modal"
                    data-target-class="is-active"
                    data-clip="true">
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
