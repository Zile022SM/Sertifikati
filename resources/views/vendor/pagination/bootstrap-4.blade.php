
<!-- pagination -->
@if ($paginator->hasPages())
<div class="col-md-12 col-sm-12 col-xs-12 text-center pagination-custom"> 
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <a  class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')"><img src="{{url('/templates/it_za_decu/images/arrow-pre-small.png')}}" alt=""/></a>
    @else 
    <a href="{{ $paginator->previousPageUrl() }}" class="pg-broj" rel="prev" aria-label="@lang('pagination.previous')"><img src="{{url('/templates/it_za_decu/images/arrow-pre-small.png')}}" alt=""/></a>
    @endif 
    
    {{-- Pagination Elements --}}
     @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <span class="page-item disabled" aria-disabled="true">{{ $element }}</span>
            @endif
            
             {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <a href="#" class="pg-broj active-pagin" aria-current="page"><span class="page-link">{{ $page }}</span></a>
                    @else
                    <a class="pg-broj" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
                @endif
                @endforeach
                {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
                <a class="pg-broj" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><img src="{{url('/templates/it_za_decu/images/arrow-next-small.png')}}" alt=""/></a>
        @else
        <a class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
               <img src="{{url('/templates/it_za_decu/images/arrow-next-small.png')}}" alt=""/>
        </a>
        @endif
</div>
@endif 
                
