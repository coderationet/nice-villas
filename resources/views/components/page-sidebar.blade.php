<div>
    <ul class="list-group">
        @foreach($pages as $page_)
            <li
                @if($page_->id == $page->id)
                    class="list-group-item active text-decoration-none" aria-current="true"
                @else
                    class="list-group-item text-decoration-none"
                @endif
            >
                <a href="{{route('front.page.show', $page_->slug)}}"
                   @if($page_->id == $page->id)
                       class="text-white text-decoration-none"
                    @endif
                >{{$page_->name}}</a>
            </li>
        @endforeach
    </ul>
</div>
