import $ from 'jquery';
import GoogleMaps from 'google-maps';

GoogleMaps.KEY = 'AIzaSyA05esJ-MwwOjDViI7mZBvbt-wUPkrEoXg';

GoogleMaps.load((google) => {
    const mapNode = document.getElementById('map_interactive');
    if (!mapNode) return;
    const vinnytsia = new google.maps.LatLng(49.234741, 28.472035);
    const map = new google.maps.Map(mapNode, {
        center: vinnytsia,
        zoom: 12,
    });
    let infoWindow = new google.maps.InfoWindow({map: map});
    let geoloc = function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                let pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                console.log(pos);
                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                map.setCenter(pos);
            })
        }
    };
    document.getElementById("geo").addEventListener("click", geoloc);
});
