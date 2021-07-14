@if ($paginator->hasPages())

    <div class="blog-pagination">
        <ul class="justify-content-center">

            @if ($paginator->onFirstPage()	)

            @else
            <li><a href="{{ $paginator->previousPageUrl()}}"><i class="icofont-rounded-left"></i></a></li>
            @endif


            @foreach ($elements as $element)
                @foreach ($element as $pages => $url)
                    @if ($paginator->currentPage() == $pages)
                        <li class="active"><a href="{{ $url  }}">{{ $pages }}</a></li>
                    @else
                        <li><a href="{{ $url  }}">{{  $pages  }}</a></li>
                    @endif
                @endforeach
            @endforeach


            @if ($paginator->hasMorePages()	)
                <li><a href="{{ $paginator->nextPageUrl()	 }}"><i class="icofont-rounded-right"></i></a></li>
            @else

            @endif



        </ul>
    </div>


@else

@endif



