@props([
    'paginator',
    'label' => 'data',
])

@if ($paginator instanceof \Illuminate\Pagination\LengthAwarePaginator && $paginator->total() > 0)
    <div class="table-footer">
        <div class="footer-text">
            Menampilkan {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }}
            dari {{ $paginator->total() }} {{ $label }}
        </div>

        @if ($paginator->hasPages())
            <div class="pagination-wrap">
                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <span class="page-item-ui disabled">‹</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-item-ui">‹</a>
                @endif

                {{-- Page Numbers --}}
                @php
                    $current = $paginator->currentPage();
                    $last = $paginator->lastPage();

                    $start = max(1, $current - 2);
                    $end = min($last, $current + 2);
                @endphp

                @if ($start > 1)
                    <a href="{{ $paginator->url(1) }}" class="page-item-ui">1</a>

                    @if ($start > 2)
                        <span class="page-item-ui dots">...</span>
                    @endif
                @endif

                @for ($page = $start; $page <= $end; $page++)
                    @if ($page == $current)
                        <span class="page-item-ui active">{{ $page }}</span>
                    @else
                        <a href="{{ $paginator->url($page) }}" class="page-item-ui">{{ $page }}</a>
                    @endif
                @endfor

                @if ($end < $last)
                    @if ($end < $last - 1)
                        <span class="page-item-ui dots">...</span>
                    @endif

                    <a href="{{ $paginator->url($last) }}" class="page-item-ui">{{ $last }}</a>
                @endif

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-item-ui">›</a>
                @else
                    <span class="page-item-ui disabled">›</span>
                @endif
            </div>
        @endif
    </div>
@endif