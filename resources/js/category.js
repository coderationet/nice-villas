import swup from './swup';

const category_page_init = () => {

    var queryString = location.search
    let params = new URLSearchParams(queryString)

    if (document.querySelector('#price-range') != null) {
        $("#price-range").slider({
            step: 100,
            range: true,
            min: 0,
            max: 100000,
            values: [params.get('min_price') ?? 0, params.get('max_price') ?? 100000],
            slide: function (event, ui) {
                $('#min_price').val(ui.values[0]);
                $('#max_price').val(ui.values[1]);
            }
        });
        $("#priceRange").val($("#price-range").slider("values", 0) + " - " + $("#price-range").slider("values", 1));


    }
}

document.addEventListener('DOMContentLoaded', () => {

    $(document).on('click', '#filter-form-submit', function (e) {
        e.preventDefault();
        const form = document.querySelector('#filter-form');
        let url = form.getAttribute('action');
        let data = new FormData(form);
        // add the data to url
        url += '?' + new URLSearchParams(data).toString();
        swup.navigate(url);
    });

    $(document).on('click','.remove-filter', function () {
        let attributeValueId = $(this).data('attribute-value-id');
        $.ajax({
            url: $(this).data('url'),
            type: 'GET',
            data: {
                attribute_value_id: attributeValueId,
                category_slug: $(this).data('category-slug')
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
        $('.filter-items').append('<button class="btn btn-sm btn-outline-secondary show-more-filters"></button>');
    }

    $('.filter-items .show-more-filters').on('click', function () {
        $('.active-filters .filter-item').each(function (index) {
            if (index > 4) {
                $(this).show();
            }
        });
        $(this).hide();

        if($('.filter-items .show-less-filters').length == 0){
            $('.filter-items').append('<button class="btn btn-sm btn-outline-secondary show-less-filters">'+$('.filter-items').data('show-more-text')+'</button>');
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

category_page_init();

export default category_page_init;
