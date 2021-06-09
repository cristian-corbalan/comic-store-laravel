@extends('layouts.control-panel')

@section('sectionTitle', 'Comics')

@section('contentClass', 'comic-form')

@section('content')
    <h3>Añadir un comic</h3>

    <form action="{{route('control-panel.comics.new')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label class="label" for="title-input">Titulo</label>
            <div class="control">
                <input
                    class="input"
                    type="text"
                    id="title-input"
                    name="title"
                    value="{{old('title')}}"
                    @error('title') aria-describedby="title-error" @enderror/>
            </div>

            @error('title')
            <div class="notification is-danger" id="title-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="number-page-input">Cantidad de paginas</label>
            <div class="control">
                <input
                    class="input"
                    type="number"
                    id="number-page-input"
                    name="number_pages"
                    value="{{old('number_pages')}}"
                    @error('number_pages') aria-describedby="number_pages-error" @enderror/>
            </div>

            @error('number_pages')
            <div class="notification is-danger" id="number_pages-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="synopsis-input">Sinopsis</label>
            <div class="control">
                    <textarea
                        class="textarea"
                        id="synopsis-input"
                        name="synopsis"
                        @error('synopsis') aria-describedby="synopsis-error" @enderror>{{old('synopsis')}}</textarea>
            </div>

            @error('synopsis')
            <div class="notification is-danger" id="synopsis-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="price-input">Precio</label>
            <div class="control">
                <input
                    class="input"
                    type="number"
                    id="price-input"
                    name="price"
                    value="{{old('price') ?? 1}}"
                    @error('price') aria-describedby="price-error" @enderror/>
            </div>

            @error('price')
            <div class="notification is-danger" id="price-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="discount-input">Descuento</label>
            <div class="control">
                <input
                    class="input"
                    type="number"
                    id="discount-input"
                    name="discount"
                    value="{{old('discount') ?? 0}}"
                    @error('discount') aria-describedby="discount-error" @enderror/>
            </div>

            @error('discount')
            <div class="notification is-danger" id="discount-error">{{$message}}</div>
            @enderror
        </div>


        <div class="field">
            <label class="label" for="stock-input">Stock</label>
            <div class="control">
                <input
                    class="input"
                    type="number"
                    id="stock-input"
                    name="stock"
                    value="{{old('stock') ?? 1}}"
                    @error('stock') aria-describedby="stock-error" @enderror/>
            </div>

            @error('stock')
            <div class="notification is-danger" id="stock-error">{{$message}}</div>
            @enderror
        </div>


        <div class="field">
            <label class="label" for="publication-date-input">Fecha de publicación</label>
            <div class="control">
                <input
                    class="input"
                    type="date"
                    id="publication-date-input"
                    name="publication_date"
                    value="{{old('publication_date')}}"
                    @error('publication_date') aria-describedby="publication_date-error" @enderror/>
            </div>

            @error('publication_date')
            <div class="notification is-danger" id="publication_date-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="cover-input">Portada del comic</label>
            <div class="control">
                <input
                    class="input"
                    type="file"
                    id="cover-input"
                    name="cover"
                    @error('cover') aria-describedby="cover-error" @enderror/>
            </div>

            @error('cover')
            <div class="notification is-danger" id="cover-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="brand-select">Seleccione la marca</label>

            <div class="control">
                <div class="select">
                    <select
                        name="brand_id" id="brand-select"
                        @error('brand_id') aria-describedby="brand-error" @enderror>

                        @foreach($brands as $brand)
                            <option
                                value="{{$brand->id}}"
                                @if(old('brand_id') == $brand->id) selected @endif>
                                {{$brand->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                @error('brand_id')
                <div class="notification is-danger" id="brand-error">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="field">
            <div class="select is-multiple">
                <label class="label" for="genres-select">Seleccione los géneros</label>

                <select
                    name="genres[]" id="genres-select" multiple size="4"
                    @error('genres') aria-describedby="genres-error" @enderror>

                    @foreach($genres as $genre)
                        <option
                            value="{{$genre->id}}"
                            @if(in_array($genre->id, old('genres', []))) selected @endif>
                            {{$genre->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            @error('genres')
            <div class="notification is-danger" id="genres-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <div class="select is-multiple">
                <label class="label" for="characters-select">Seleccione los personajes</label>

                <select
                    name="characters[]" id="characters-select" multiple size="4"
                    @error('characters') aria-describedby="characters-error" @enderror>

                    @foreach($characters as $character)
                        <option
                            value="{{$character->id}}"
                            @if(in_array($character->id, old('characters', []))) selected @endif>
                            {{$character->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            @error('characters')
            <div class="notification is-danger" id="characters-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <div class="select is-multiple">
                <label class="label" for="authors-select">Seleccione los escritores</label>

                <select
                    name="authors[]" id="authors-select" multiple size="4"
                    @error('authors') aria-describedby="authors-error" @enderror>

                    @foreach($authors as $author)
                        <option
                            value="{{$author->id}}"
                            @if(in_array($author->id, old('authors', []))) selected @endif>
                            {{$author->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            @error('authors')
            <div class="notification is-danger" id="authors-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <div class="select is-multiple">
                <label class="label" for="artists-select">Seleccione los artistas</label>

                <select
                    name="artists[]" id="artists-select" multiple size="4"
                    @error('artists') aria-describedby="artists-error" @enderror>

                    @foreach($artists as $artist)
                        <option
                            value="{{$artist->id}}"
                            @if(in_array($artist->id, old('artists', []))) selected @endif>
                            {{$artist->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            @error('artists')
            <div class="notification is-danger" id="artists-error">{{$message}}</div>
            @enderror
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link">Añadir</button>
            </div>
        </div>
    </form>
@endsection
