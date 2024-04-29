@if ($paginator->hasPages())
    <a href="{{ $paginator->url(1) }}" class="{{ $paginator->onFirstPage() ? 'active' : '' }}">{{ $paginator->currentPage() }}</a>
    of
    <a href="#">{{ $paginator->lastPage() }}</a>
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-long-arrow-right"></i></a>
    @endif
@endif
