var queryString = location.search
let params = new URLSearchParams(queryString)

// example of retrieving 'id' parameter
// let id = parseInt(params.get("id"))
// console.log(id)

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
