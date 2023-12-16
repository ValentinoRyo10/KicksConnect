@extends('layouts.app')

@section('title', 'Search Products')

@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4>Search Results</h4>
                    <div class="underline mb-4"></div>
                </div>

                @forelse ($searchProducts as $productItem)
                    <div class="col-md-10">
                        <div class="product-card">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-card-img">

                                        @if ($productItem->productImages->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                    alt="{{ $productItem->name }}">
                                            </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $productItem->brand }}</p>
                                        <h5 class="product-name">
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            @if ($productItem->selling_price == $productItem->original_price)
                                                <span class="selling-price">Rp
                                                    {{ number_format($productItem->selling_price, 0, ',', '.') }}</span>
                                            @else
                                                <span class="selling-price">Rp
                                                    {{ number_format($productItem->selling_price, 0, ',', '.') }}</span>
                                                <span class="original-price">Rp
                                                    {{ number_format($productItem->original_price, 0, ',', '.') }}</span>
                                            @endif
                                        </div>
                                        <p style="height:45px; overflow:hidden">
                                            <b>Description : </b> {{ $productItem->description }}
                                        </p>
                                        <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"
                                            class="btn"
                                            style="background-color: black; color:#FFD700;">
                                            View
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-2 col-md-12">
                        <h4>No Products Found !</h4>
                    </div>
                @endforelse

                <div class="col-md-10">
                    {{ $searchProducts->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
