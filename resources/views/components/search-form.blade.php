<div class="col-md-7 d-flex justify-content-center align-items-center mx-auto">
    <form action="{{route('front.search.index')}}" method="post" enctype="multipart/form-data" class="w-100" id="home-search-form">
        @csrf
        <div class="search-form w-100 pt-5 d-flex justify-content-center">
            <div class="search-location-container col-md-5 flex-grow-1 d-flex">
                <select name="location_id" class="search-location w-100 flex-grow-1" id="search-location-id">
                    <option value="">Select a location</option>
                </select>
            </div>
            <div class="search-category-container col-md-5 flex-grow-1">
                <select name="category_slug" class="select-category w-100" id="search-category-slug">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->slug}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 flex flex-grow-1">
                <button type="button" class="btn btn-primary rounded-0 w-100 flex-grow-1 h-100 home-search">Search</button>
            </div>
        </div>
    </form>
</div>

@pushonce('extra-footer')
    <style>
        /* Make select boxes 50% and aligned */
        .select2-container--default .select2-selection--single {
            height: 50px;
            border: 1px solid #ebebeb;
            padding: 0 20px;
            font-size: 16px;
            line-height: 48px;
            color: #666;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 48px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px;
            right: 10px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            margin-top: 0;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #666;
        }

        /* select2 item .search-location border top radius */
        .search-location-container .select2-container--default .select2-selection--single {
            border-radius: 0!important;
            border-right: 0;
        }

        .search-category-container .select2-container--default .select2-selection--single {
            border-top-left-radius: 0px !important;
            border-bottom-left-radius: 0px !important;
            border-top-right-radius: 5px !important;
            border-bottom-right-radius: 5px !important;
        }

        .search-form button {
            border-top-right-radius: 5px !important;
            border-bottom-right-radius: 5px !important;

        }

    </style>
@endpushonce
