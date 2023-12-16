@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">

        <div class="carousel-inner">
            @foreach ($sliders as $key => $slideritem)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    @if ($slideritem->image)
                        <img src="{{ asset("$slideritem->image") }}" class="d-block w-100" alt="...">
                    @endif
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {!! $slideritem->title !!}
                            </h1>
                            <p>
                                {!! $slideritem->description !!}
                            </p>
                            <div>
                                <a href="{{ url('collections/sneakers-collection/air-jordan-1-mid') }}" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            @endforeach


        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4 style="font-weight: bold; font-size:30px">Discover Your Signature Style with KicksConnect !</h4>
                    <div class="underline mx-auto"></div>
                    <p style="font-size: 18px; font-family: Verdana; font-style:italic">
                        From timeless classics to the latest trends, find the perfect pair for every occasion. Quality meets
                        comfort in our curated collection. Stay ahead in style with our regularly updated inventory.
                        Experience exceptional service and join our shoe-loving community today!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Products</h4>
                    <div class="underline mb-4"></div>
                </div>
                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($trendingProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-warning text-black">Trending</label>

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
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>New Arrivals</h4>
                    <div class="underline mb-4"></div>
                </div>
                @if ($newArrivalProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($newArrivalProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-success">New</label>

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
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No New Arrivals Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Featured Products</h4>
                    <div class="underline mb-4"></div>
                </div>
                @if ($featuredProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($featuredProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-success">Featured</label>

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
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Featured Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $('.four-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>

@endsection
