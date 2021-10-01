@extends('layouts.website')


@section('content')
    <main id="main-comic-details">

        <div id="comic-info" class="container">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{route('home')}}">Inicio</a></li>
                    <li><a href="{{route('comics.list')}}">Comics</a></li>
                    <li class="is-active"><a href="#">{{$comic->title}}</a></li>
                </ul>
            </nav>

            <div>
                <img src="{{asset('storage/img/'. $comic->cover->src)}}" alt="{{$comic->cover->alt}}">
            </div>

            <div>
                <div>
                    <h1>{{$comic->title}}</h1>

                    <p class="brand">{{$comic->brand->name}}</p>

                    <ul>
                        <li>
                            <p>
                                <span class="bold">Fecha de lanzamiento: </span>
                                {{$comic->publication_date}}
                            </p>
                        </li>

                        <li>
                            <span class="bold">Escrito por: </span>

                            @foreach($comic->authors as $author)
                                <span>{{$author->name}}. </span>
                            @endforeach
                        </li>

                        <li>
                            <span class="bold">Arte por: </span>

                            @foreach($comic->artists as $artist)
                                <span>{{$artist->name}}. </span>
                            @endforeach
                        </li>

                        <li>
                            <span class="bold">Géneros: </span>

                            <span class="is-block">
                                @foreach($comic->genres as $genre)
                                    <span class="genres-tag">{{$genre->name}}</span>
                                @endforeach
                            </span>
                        </li>
                    </ul>
                </div>

                <div>
                    <div class="price">
                        @if($comic->discount)
                            <div>
                                <p><span class="sr-only">Precio sin oferta</span> USD ${{$comic->price / 100}}</p>
                                <p class="ComicPrice">
                                    USD$ {{($comic->getPrice())}}</p>
                            </div>
                            <p>{{$comic->discount}}% OFF</p>
                        @else
                            <div class="price-only">
                                <p class="ComicPrice">USD${{$comic->getPrice()}}</p>
                            </div>
                        @endif
                    </div>

                    @if($comic->stock)
                        <form action="{{route('shop.add')}}">
                            <input type="hidden" name="product_id" value="{{$comic->id}}">
                            <button class="button">
                                Añadir al carro
                            </button>
                        </form>
                    @else
                        <button class="button" disabled>Sin stock</button>
                    @endif
                </div>
            </div>
        </div>

        <section id="comic-tabs">
            <h2 class="sr-only">Detalles</h2>
            <div class="container"> {{--container-all--}}
                <div class="container-tabs-btn">
                    <nav class="tabs is-boxed is-medium">
                        <ul>
                            <li class="tab is-active" data-tab-content-id="synopsis">
                                <a>Sinopsis</a>
                            </li>

                            <li class="tab" data-tab-content-id="characters">
                                <a>Personajes</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="section">
                    <div id="synopsis" class="content-tab">
                        <p>{!! nl2br($comic->synopsis)!!}</p>

                    </div>

                    <div id="characters" class="content-tab" style="display:none">
                        <ul>

                            @foreach($comic->characters as $character)
                                <li>
                                    <div>
                                        <img
                                            src="{{asset('storage/img/' . $character->profileImg->src)}}"
                                            alt="{{$character->profileImg->alt}}"/>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
