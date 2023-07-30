<nav class="navbar navbar-expand-lg main-navigation">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav flex gap-2 ms-lg-3">

                <li class="nav-item py-lg-3">
                    <a class="nav-link active " aria-current="page" href="#">{{__('front/general.home')}}</a>
                </li>
                <li class="nav-item dropdown py-lg-3">
                    <a class="nav-link dropdown-toggle text-black  " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('front/menu.corporate')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </li>
                <li class="nav-item py-lg-3">
                    <a class="nav-link active  " aria-current="page" href="#">{{__('front/menu.contact')}}</a>
                </li>
                @foreach($categories as $category)
                    <li class="nav-item py-lg-3">
                        <a class="nav-link active border rounded nav-category-link" aria-current="page" href="{{route('front.category.show',$category->slug)}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
            <a href="#" class="btn btn-outline-secondary ms-auto">
                <i class="fas fa-plus"></i> {{ __('front/menu.add_new_property')}}
            </a>
        </div>
    </div>
</nav>
