import swup from './swup';

const category_page_init = () => {
    var queryString = location.search
    let params = new URLSearchParams(queryString)

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

    $(document).on('submit','#filter-form', function (e) {
        e.preventDefault();
        const form = document.querySelector('#filter-form');
        let url = form.getAttribute('action');
        let data = new FormData(form);
        // add the data to url
        url += '?' + new URLSearchParams(data).toString();
        swup.navigate(url);
    });

}

category_page_init();

export default category_page_init;
