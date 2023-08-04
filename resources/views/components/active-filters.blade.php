@if(count($filters['filter_values']))
    <div class="bg-white rounded p-3 border mb-3 active-filters">
        <div class="item bg-white">
            <div class="row">
                <div class="d-flex gap-3 flex-wrap filter-items">
                    @foreach($filters['filter_values'] as $filter)
                        <div class="btn-group filter-item">
                            <button type="button"
                                    class="btn btn-sm btn-outline-secondary">{{ $filter['value'] }}</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary remove-filter"
                                    data-attribute-value-id="{{$filter['id']}}"><i
                                    class="fas fa-times"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
@pushonce('extra-footer')
    <script type="module">
        $(function () {
            $(document).on('click','.remove-filter', function () {
                let attributeValueId = $(this).data('attribute-value-id');
                $.ajax({
                    url: '{{route('front.category.remove-filter')}}',
                    type: 'GET',
                    data: {
                        attribute_value_id: attributeValueId,
                        category_slug: '{{$category->slug}}'
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            swup.navigate(response.url);
                        }
                    }
                });
            });
            var filter_count = $('.active-filters .filter-item').length;
            // if (filter_count > 5) hide the rest
            if (filter_count > 5) {
                $('.active-filters .filter-item').each(function (index) {
                    if (index > 4) {
                        $(this).hide();
                    }
                });
                $('.filter-items').append('<button class="btn btn-sm btn-outline-secondary show-more-filters">{{__('front/general.show_more')}}</button>');
            }

            $('.filter-items .show-more-filters').on('click', function () {
                $('.active-filters .filter-item').each(function (index) {
                    if (index > 4) {
                        $(this).show();
                    }
                });
                $(this).hide();

                if($('.filter-items .show-less-filters').length == 0){
                    $('.filter-items').append('<button class="btn btn-sm btn-outline-secondary show-less-filters">{{__('front/general.show_less')}}</button>');
                }

                $('.filter-items .show-less-filters').show();
            });

            $('.filter-items').on('click', '.show-less-filters', function () {
                $('.active-filters .filter-item').each(function (index) {
                    if (index > 4) {
                        $(this).hide();
                    }
                });
                $(this).hide();
                $('.filter-items .show-more-filters').show();
            });

        });
    </script>
@endpushonce
