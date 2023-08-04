import Swup from 'swup';

import {init_home} from './home';
import category_page_init from './category';

const swup = new Swup();


function init(){
    init_home();
    category_page_init();
}

swup.hooks.on('page:view', init);


window.swup = swup;

export default swup;
