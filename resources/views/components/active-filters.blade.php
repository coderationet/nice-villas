@if(count($filters['filter_values']))
    <div class="bg-white rounded p-3 border mb-3">
        <div class="item bg-white">
            <div class="row">
                <div class="d-flex gap-3 flex-wrap">
                    @foreach($filters['filter_values'] as $filter)
                        <div class="btn-group">
                            <button type="button"
                                    class="btn btn-sm btn-outline-secondary">{{ $filter['value'] }}</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary remove-filter" data-attribute-value-id="{{$filter['id']}}"><i
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
        $(function (){
            $('.remove-filter').on('click',function (){
                let attributeValueId = $(this).data('attribute-value-id');
                $.ajax({
                    url: '{{route('front.category.remove-filter')}}',
                    type: 'GET',
                    data: {
                        attribute_value_id: attributeValueId,
                        request_params: {!! json_encode(request()->all()) !!},
                        category_slug: '{{$category->slug}}'
                    },
                    success: function (response){
                        if(response.status === 'success'){
                            window.location = response.url;
                        }
                    }
                });
            });
        });
    </script>
@endpushonce
