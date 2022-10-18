import {Upload} from 'element-ui'
import {Select} from 'element-ui'

Vue.component('map-index', {

    props: {
        offers_data:null,

    },

    data() {
        return {

            lat:null,
            lng:null,

           }
    },

    mounted() {
        this.initMap();
    },

    methods: {
        initMap() {
            var lat = this.lat ? Number(this.lat) : 24.633333;
            var lng = this.lng ? Number(this.lng) : 46.716667;

            var pos = {
                lat: lat,
                lng: lng
            };
            console.log(pos);
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: pos
            });

            _.each( this.offers_data, function( index ){
                console.log(index)
                var lat= index,lat;
                var lng=index,lng;

                var myLatLng = {lat: Number(lat), lng: Number(lng)};

                var marker = new google.maps.Marker({
                    position: myLatLng ,
                    map: map,
                    // title: index.client.name
                });

            });


        },
    },

    computed: {

    },

    components: {

        Upload,
        Select
    }
});
