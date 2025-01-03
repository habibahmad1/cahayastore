@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            {{-- Angka Halaman --}}
            @foreach ($elements as $element)
                {{-- Tanda titik --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Link Angka Halaman --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        {{-- Selalu tampilkan 3 angka pertama (1, 2, 3) --}}
                        @if ($page <= 3)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        {{-- Halaman dinamis (3 angka sebelumnya hingga sekarang) --}}
                        @elseif (
                            ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage())
                        )
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        {{-- Tampilkan halaman terakhir --}}
                        @elseif ($page == $paginator->lastPage())
                            @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    </nav>
@endif
