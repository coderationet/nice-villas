import Swup from 'swup';
import home_swiper from './home-slider';
import item_swiper from './item-slider';

const swup = new Swup();

function init(){
    // home_swiper.update();
    // item_swiper.update();
}


swup.hooks.on('page:view', () => init());


$(document).on('submit','#filter-form', function (e) {
    e.preventDefault();
    const form = document.querySelector('#filter-form');
    let url = form.getAttribute('action');
    let data = new FormData(form);
    // add the data to url
    url += '?' + new URLSearchParams(data).toString();
    swup.navigate(url);
});


window.swup = swup;
