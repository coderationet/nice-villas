import swup from './swup';

import select2 from 'select2';

function init_home() {

    select2();

    $('.search-location').select2({
        ajax: {
            url: '/attribute-values/get',
            dataType: 'json',
            method: 'POST',
            delay: 250,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (params) {
                return {
                    attribute_id: 2,
                    q: params.term,
                    page: params.page || 1,
                };
            },
            cache: false
        },
        placeholder: 'Select a location',
        minimumInputLength: 0,
        allowClear: true,
        templateResult: function (location) {
            if (location.loading) return location.text;
            return location.text;
        },
        templateSelection: function (location) {
            return location.text;
        }
    });

    $('.select-category').select2({
        allowClear: true,
    });

}

$(document).on('click', '.home-search', function () {

    let location_id = $('#search-location-id').val();
    let category_slug = $('#search-category-slug').val();

    // values should be set
    if (!location_id || !category_slug) {
        alert('Please select a location and a category');
        return;
    }

    let home = $('base').attr('href');

    let url = home + '/villas/' + category_slug + '?attribute_location[]=' + location_id;

    swup.navigate(url);

    alert('adad');

});


init_home();

export {init_home};
