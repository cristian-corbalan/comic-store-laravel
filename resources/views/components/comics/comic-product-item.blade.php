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
            <p>USD$ {{$comic->getPrice()}}</p>

            @if($comic->stock)
                <form action="{{route('shop.add')}}">
                    <input type="hidden" name="product_id" value="{{$comic->id}}">
                    <button class="button">
                        Añadir
                        <span class="icon-shopping-cart"></span>
                    </button>
                </form>
            @else
                    <button class="button" disabled>Sin stock</button>
            @endif
        </div>
    </article>
</div>
