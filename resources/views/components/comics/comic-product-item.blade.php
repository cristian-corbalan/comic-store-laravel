<div>
    <article class="comic-item">
        <div class="img-container">
            <img src="{{ asset('storage/img/'. $comic->cover->src ) }}" alt="Portada de {{ $comic->cover->alt }}">
        </div>
        <div>
            <p>{{$comic->brand->name}}</p>
            <p>{{$comic->title}}</p>
        </div>
        <div>
            @if($comic->discount)
                <p>USD$ {{(($comic->price * $comic->discount) / 100) / 100}}</p>
            @else
                <p>USD$ {{$comic->price / 100}}</p>
            @endif
                <button class="button">
                    Añadir
                    <span class="icon-shopping-cart"></span>
                </button>
        </div>
    </article>
</div>