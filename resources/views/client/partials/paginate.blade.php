<div class="page-pagination">
    @if( $paginator->currentPage() >1 )
    <a href="#"><img src="{{ asset('administrator/img/shop/prev.png')}}" alt=""></a>
   @endif
    @for($i = 1; $i <= $paginator->lastPage(); $i++)
    <a class="{{ $paginator->currentPage() == $i ? 'active' : '' }}" href="{{ $paginator->url($i) }}" 
       style="{{ $paginator->currentPage() == $i ? 'color: aqua;' : '' }}">
        {{$i}}
    </a>
    @endfor
    @if($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}">
        <img src="{{ asset('administrator/img/shop/next.png') }}" alt="Next Page">
    </a>
    @endif
</div>
</div>