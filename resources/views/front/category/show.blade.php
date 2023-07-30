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
    <div class="container category-page ">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                Sonuçlar
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                {{$items->count()}} tane sonuç bulundu
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2">
                                Fiyat
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                Test fiyat aralığı
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Kapalı İtem Örnek
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Kapalı item içerik
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-3 border bg-white rounded">--}}
{{--                    <div class="row border-bottom py-3">--}}
{{--                        <h5>--}}
{{--                            Sonuçlar--}}
{{--                        </h5>--}}
{{--                        <div>--}}
{{--                            <strong>{{$items->count()}}</strong> tane sonuç bulundu--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row border-bottom py-3 ">--}}
{{--                        <h5>Fiyat</h5>--}}

{{--                    </div>--}}
{{--                    <div class="row border-bottom py-3 ">--}}
{{--                        <h5>Puan</h5>--}}
{{--                    </div>--}}
{{--                    <div class="row border-bottom py-3 ">--}}
{{--                        <h5>Konaklama Tipi</h5>--}}
{{--                    </div>--}}
{{--                    <div class="row border-bottom py-3 ">--}}
{{--                        <h5>Bölgeler</h5>--}}
{{--                    </div>--}}
{{--                    <div class="row border-bottom py-3 ">--}}
{{--                        <h5>Otel Tipi</h5>--}}
{{--                    </div>--}}
{{--                    <div class="row border-bottom py-3 ">--}}
{{--                        <h5>Konaklama Tipi</h5>--}}
{{--                    </div>--}}
{{--                    <div class="row py-3 ">--}}
{{--                        <h5>Çocuklar İçin</h5>--}}
{{--                    </div>--}}
{{--            </div>--}}
            <div class="col-md-9">
                <div class="bg-white rounded p-3 border">
                    @foreach($items as $item)
                        <div class="item">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{route('front.item.show',$item->slug)}}">
                                        <img src="{{asset('storage/media/'.$item->thumbnail->name)}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                   <div class="row">
                                       <div class="col-md-9">
                                           <a href="{{route('front.item.show',$item->slug)}}" class="text-decoration-none text-black">
                                               <h2>{{$item->title}}</h2>
                                           </a>
                                           <p class="text-gray fs-12">Mugla / Ordaca / Dalyan</p>
                                           <div class="d-flex gap-1">
                                               @foreach($item->categories as $category)
                                                   <span class="badge bg-primary">{{$category->name}}</span>
                                               @endforeach
                                           </div>
                                       </div>
                                       <div class="col-md-3">
                                           <p class="peoppe">
                                                  <i class="fas fa-user"></i> 2 Kişilik
                                           </p>
                                           <p class="price">
                                               {{number_format($item->price,2,',','.')}} ₺
                                           </p>
                                       </div>
                                   </div>
                                    <div class="row">
                                        {{$items->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
@push('extra-footer')

@endpush
