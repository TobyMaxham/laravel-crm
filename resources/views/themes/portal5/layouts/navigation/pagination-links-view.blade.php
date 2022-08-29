<?php /** @var $paginator \Illuminate\Pagination\LengthAwarePaginator */ ?>
<div>
    <div>
        <p>
            {{ __('pagination.Showing') }}
            <span id="first" class="font-medium">{{$paginator->firstItem()}}</span>
            {{ __('pagination.to') }}
            <span id="last" class="font-medium">{{$paginator->lastItem()}}</span>
            {{ __('pagination.of') }}
            <span id="total" class="font-medium">{{$paginator->total()}}</span>
            {{ __('pagination.results') }}
        </p>
    </div>

    @if($paginator->hasPages())
        <nav class="app-pagination" id="pagination-nav">
            <ul class="pagination justify-content-center" id="pagination-nav-list">
                @if($paginator->onFirstPage())
                    <li class="page-item disabled" id="pagination-nav-first-enabled">
                        <button class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            {!! __('pagination.previous') !!}
                        </button>
                    </li>
                @else
                    <li class="page-item" id="pagination-nav-first-disabled">
                        <button class="page-link" wire:click="previousPage" wire:loading.attr="disabled">
                            {!! __('pagination.previous') !!}
                        </button>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled"><button class="page-link" aria-disabled="true">{{ $element }}</button></li>
                    @endif

                    {{-- Array Of Links--}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><button class="page-link">{{ $page }}</button></li>
                            @else
                                <li class="page-item"><button class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if($paginator->hasMorePages())
                    <li class="page-item" id="pagination-nav-last-disabled">
                        <a class="page-link" wire:click="nextPage" wire:loading.attr="disabled">
                            {!! __('pagination.next') !!}
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" id="pagination-nav-last-enabled">
                        <button class="page-link" aria-disabled="true">
                            {!! __('pagination.next') !!}
                        </button>
                    </li>
                @endif
            </ul>
        </nav><!--//app-pagination-->
    @endif
</div>
