@extends('layouts.app')
@section('content')
    <div class="page">
        <!-- Slider main container -->
        <div class="swiper home-slider">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($slider_slides as $slide)
                    <div class="swiper-slide">
                        <img class="desktop-image d-none d-md-block"
                             src="{{asset('storage/media/'.$slide->desktop->name)}}" alt="{{$slide->title}}">
                        <img class="mobile-image d-block d-md-none"
                             src="{{asset('storage/media/'.$slide->mobile->name)}}" alt="{{$slide->title}}">
                    </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
        <div class="home-search">
            <div class="search-form">

            </div>
        </div>
        <div class="container">
            <x-search-form />
        </div>
        @include('front.partials.home-categories', ['category' => $categories[0], 'items' => $for_sale_items])
        @include('front.partials.home-categories', ['category' => $categories[1], 'items' => $for_rent_items])
        @include('front.partials.home-categories', ['category' => $categories[2], 'items' => $for_holiday_items])
    </div>
@endsection
