import axios from 'axios';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'fontawesome-free/js/all.min.js';
import './home-slider';
import './item-slider';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import $ from 'jquery';
window.$ = $;
