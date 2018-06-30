import $ from 'jquery';
import Swiper from 'swiper';
import GoogleMaps from 'google-maps';
import { Modal } from 'bootstrap';


// const galleryTop = new Swiper('.gallery-top', {
//     spaceBetween: 10,
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//     },
// });
// const galleryThumbs = new Swiper('.gallery-thumbs', {
//     spaceBetween: 10,
//     centeredSlides: true,
//     slidesPerView: 'auto',
//     touchRatio: 0.2,
//     slideToClickedSlide: true,
// });
// galleryTop.forEach((el, key) => {
//     galleryTop[key].controller.control = galleryThumbs[key];
//     galleryThumbs[key].controller.control = galleryTop[key];
// });

$('.js-show-map-modal').click(function () {
    const lat = $(this).data('lat');
    const lng = $(this).data('lng');
    const lngNode = document.getElementById('lng');
    const latNode = document.getElementById('lat');
    console.log(lat, 'and', lng);
});

// GoogleMaps.KEY = 'AIzaSyA05esJ-MwwOjDViI7mZBvbt-wUPkrEoXg';

GoogleMaps.load((google) => {
    const mapNode = document.getElementById('map');
    if (!mapNode) return;
    const lngNode = document.getElementById('lng');
    const latNode = document.getElementById('lat');
    const latitude = 49.234741;
    const longitude = 28.472035;
    const myLatLng = {lat: latitude, lng: longitude};

    const map = new google.maps.Map(mapNode, {
        center: myLatLng,
        zoom: 14,
    });

    let marker;


    // Create new marker on double click event on the map
    google.maps.event.addListener(map, 'click', function (event) {
        !!marker && marker.setMap(null); //remove marker if marker is true (!! operators)
        latNode.value = event.latLng.lat();
        lngNode.value = event.latLng.lng();
        marker = new google.maps.Marker({
            position: event.latLng,
            map: map,
            title: `${event.latLng.lat()}, ${event.latLng.lng()}`,
        });

        // Update lat/long value of div when the marker is clicked
        marker.addListener('click', function () {
            marker.setMap(null);
        });
    });
});


$('div.alert-success').delay(3000).slideUp(500);
$('div.alert-danger').delay(3000).slideUp(500);

// Try to resolve this class wich stands below
