import Swiper from 'swiper';
import 'swiper/css';

window.Swiper = Swiper;

const swiper = new Swiper('.home-slider', {
    loop: true,
});
