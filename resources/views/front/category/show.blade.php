@extends('layouts.app')
@section('title', $category->name)
@section('content')
    @include('breadcrumbs', ['breadcrumbs' => [
        [
            'name' => 'Home',
            'url' => route('home')
        ],
        [
            'name' => $category->name,
            'url' => route('front.category.show', $category->slug)
        ]
    ]])
    <div class="container category-page page">
        <div class="row">
            <div class="col-md-3 mb-3">
                <x-filters :items="$items"  />
            </div>
            <div class="col-md-9">
                <x-active-filters  :category="$category"/>
                <div class="">
                    @foreach($items as $item)
                        <div class="item bg-white rounded p-3 border mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{route('front.item.show',$item->slug)}}">
                                        <img src="{{asset('storage/media/'.$item->thumbnail->name)}}" alt=""
                                             class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <a href="{{route('front.item.show',$item->slug)}}"
                                               class="text-decoration-none text-black">
                                                <h2>{{$item->title}}</h2>
                                            </a>
                                            <p class="text-gray fs-12">{{$item->attributeValues[0]->value}}</p>
                                            <div class="d-flex gap-1">
                                                @foreach($item->categories as $category)
                                                    <span class="badge bg-primary">{{$category->name}}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <p class="peoppe">
                                                <i class="fas fa-user"></i> {{$item->attributeValues[1]->value}}
                                            </p>
                                            <p class="price">
                                                {{number_format($item->price,2,',','.')}} ₺
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($items->hasPages())
                    <div class="bg-white rounded p-3 border text-center pb-0 pagination">
                        {{$items->links()}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('extra-footer')
    <script type="module">
        $(function () {
            $("#price-range").slider({
                step: 100,
                range: true,
                min: 0,
                max: 100000,
                values: [{{request()->get('min_price') ?? 0}}, {{request()->get('max_price') ?? 100000}}],
                slide: function (event, ui) {
                    $('#min_price').val(ui.values[0]);
                    $('#max_price').val(ui.values[1]);
                }
            });
            $("#priceRange").val($("#price-range").slider("values", 0) + " - " + $("#price-range").slider("values", 1));
        });
    </script>
@endpush
