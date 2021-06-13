<div>
    <article class="comic-item">
        <div class="img-container">
            <a href="{{route('comics.details', ['comic' => $comic->id])}}">
                <img src="{{ asset('storage/img/'. $comic->cover->src ) }}" alt="Portada de {{ $comic->cover->alt }}">
            </a>
        </div>

        <div>
            <p>{{$comic->brand->name}}</p>
            <h3>
                <a href="{{route('comics.details', ['comic' => $comic->id])}}">
                    {{$comic->title}}
                </a>
            </h3>
        </div>

        <div>
            @if($comic->discount)
                <p>USD$ {{($comic->price - ($comic->price*$comic->discount/100))  / 100}}</p>
            @else
                <p>USD$ {{$comic->price / 100}}</p>
            @endif

            <a href="{{route('shop.add')}}" class="button">
                Añadir
                <span class="icon-shopping-cart"></span>
            </a>
        </div>
    </article>
</div>
