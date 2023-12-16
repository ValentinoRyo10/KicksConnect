@extends('layouts.app')

@section('title', 'Featured Products')

@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Featured Products</h4>
                    <div class="underline mb-4"></div>
                </div>

                @forelse ($featuredProducts as $productItem)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">Featured</label>

                                @if ($productItem->productImages->count() > 0)
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                            alt="{{ $productItem->name }}">
                                    </a>
                                @endif

                            </div>
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
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-2 col-md-12">
                        <h4>No Featured Products Available</h4>
                    </div>
                @endforelse

                <div class="text-center">
                    <a href="{{ url('collections') }}" class="btn btn-warning px-3">View More</a>
                </div>
            </div>
        </div>
    </div>

@endsection
