<div>
    <nav class="pagination" role="navigation" aria-label="pagination">
        <ul class="pagination-list">
            <li>
                <a
                    class="pagination-previous"
                    @if($items->currentPage() === 1)
                    title="Esta es la primera pagina"
                    disabled
                    @else
                    href="{{$items->url($items->currentPage()-1)}}"
                    title="Ir a la pagina {{$items->currentPage()-1}}"
                    @endif
                >Anterior</a>
            </li>
            <li>
                <a
                    class="pagination-next"
                    @if($items->currentPage() === $items->lastPage())
                    title="Esta es la ultima pagina"
                    disabled
                    @else
                    href="{{$items->nextPageUrl()}}"
                    title="Ir a la pagina {{$items->currentPage()+1}}"
                    @endif>Siguiente</a>
            </li>
        </ul>
    </nav>
</div>
