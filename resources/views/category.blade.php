@extends('layouts.admin', ['title' => 'Categories'])

@section('mainContent')
    <div class="container">
        <div class="row row-gap-3">
            @foreach($categories as $category)
            <div class="col-md-6">
                <div class="single-category">
                    <h3 class="fw-bold">{{ $category->name }}</h3>
                    <p class="m-0">Total Products: {{ $category->products->count() }}</p>
                </div>
            </div>
            @endforeach

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    @if ($categories->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">Previous</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $categories->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">Previous</span>
                        </a>
                    </li>
                    @endif

                    @for ($i = 1; $i <= $categories->lastPage(); $i++)
                    <li class="page-item {{ $i === $categories->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor

                    @if ($categories->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $categories->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">Next</span>
                        </a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-hidden="true">Next</span>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endsection
