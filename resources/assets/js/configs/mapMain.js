import $ from 'jquery';
import GoogleMaps from 'google-maps';
GoogleMaps.KEY = 'AIzaSyA05esJ-MwwOjDViI7mZBvbt-wUPkrEoXg';

const defaultConfig = {
    zoom: 14,
    center: {
        lat: 49.234741,
        lng: 28.472035
    }
};
const mapNode = document.getElementById('map');


class Map {
    constructor($container, config) {
        this.config = $.extends({}, defaultConfig, config);
        this.onInit = new Promise(function (resolve, reject) {
            GoogleMaps.load(google => {
                this.map = new google.map($container, this.config);
                resolve(google);
                this.google = new google;
            });
        })
    }

    setMarker() {
        let markers = this.google.map.Map({
            position: this.map,
            map: this.map,


        })
    }

    // removeMarker() {
    //     markers[].SetUp(null);
    // }
}


const map = new Map(mapNode, defaultConfig);
map.onInit.then(google => {
    map.setMarker();
});