import Swiper from "swiper"

const galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});
const galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    centeredSlides: false,
    slidesPerView: 'auto',
    touchRatio: 0.2,
    slideToClickedSlide: true,
    autoplay: {
        delay: 3000,
        speed:4000,
        reverseDirection: false
    },
});
galleryTop.forEach((el, key) => {
    galleryTop[key].controller.control = galleryThumbs[key];
    galleryThumbs[key].controller.control = galleryTop[key];
});
