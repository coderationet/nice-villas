import Swup from 'swup';
import home_swiper from './home-slider';
import item_swiper from './item-slider';
import {init_home} from './home';
import category_page_init from './category';

const swup = new Swup();

window.swup = swup;

swup.hooks.on('page:view', function () {
    init_home();
    category_page_init();
});


export default swup;
