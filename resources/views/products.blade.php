@extends('layouts.admin', ['title' => 'Products'])

@section('mainContent')
    <div class="container">
        <div class="products mb-3">
            @foreach($products as $product)
            <div class="__single">
                <div class="image">
                    <img class="w-100" src="https://www.bdshop.com/pub/media/catalog/product/cache/eaf695a7c2edd83636a0242f7ce59484/b/a/baseus_6-in-1_usb_c_hub.jpg" alt="">
                </div>
                <div>
                    <h2>{{ $product->name }}</h2>
                    <div>
                        <p class="fw-bold m-0">Categories:</p>
                        <div>
                            @foreach($product->categories as $category)
                                <span class="badge bg-info text-capitalize">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <p class="fw-bold m-0">Features:</p>
                        <ul>
                            @foreach($product->features as $feature)
                                <li class="text-capitalize">{{ $feature->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <nav aria-label="Page navigation example mt-2">
            <ul class="pagination justify-content-center">
                @if ($products->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">Previous</span>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">Previous</span>
                    </a>
                </li>
                @endif

                @for ($i = 1; $i <= $products->lastPage(); $i++)
                <li class="page-item {{ $i === $products->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                </li>
                @endfor

                @if ($products->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
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

    <script>
        $("#imgSrc").attr('src', "https://ui-avatars.com/api/?background=random&color=fff&name={{ auth()->user()->name }}")
    </script>
@endsection
