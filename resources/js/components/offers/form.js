import {Upload} from 'element-ui'
import {Select} from 'element-ui'

Vue.component('offers-form', {

    props: {
        item: Object,
        clients:null,
        posters:null,
        users:null,

    },

    data() {
        return {
            client_id: null,
            order_type: 'rent',
            real_estate_type: 'flat',
            city: null,
            neighborhood: null,
            space: null,
            price: null,
            details: null,
            no_planned: null,
            no_piece: null,
            soum: null,
            limit: null,
            poster_id: null,
            mediator: null,
            mediators:[
                {id:'direct', name:'مباشر'},
                {id:'not_direct', name:'غير مباشر'},
            ],

            order_type_arr:[
                {id:'rent', name:'إيجار'},
                {id:'real_estate', name:'عقار'},
            ],
            real_estate_type_arr:[
                {id:'flat', name:'شقة'},
                {id:'fella', name:'فلة'},
                {id:'land', name:'أرض'},
                {id:'rest', name:'استراحة'},
            ],
            instrument_image:null,
            lat:null,
            lng:null,
            name: null,
            mobile: null,
            tel: null,
            ID_no: null,
            email: null,
            job: null,
            company_name:null,
            user_id:null,
            disabled:false,
            headers_crsf: {
                'X-CSRF-TOKEN': c_token,
            },
           }
    },

    mounted() {
        this.initMap();
        if(this.item) {
            this.client_id = this.item.client_id;
            this.order_type= this.item.order_type;
            this.real_estate_type= this.item.real_estate_type;
            this.city = this.item.city;
            this.neighborhood = this.item.neighborhood;
            this.space = this.item.space;
            this.soum = this.item.soum;
            this.price = this.item.price;
            this.limit = this.item.limit;
            this.details = this.item.details;
            this.no_planned = this.item.no_planned;
            this.no_piece = this.item.no_piece;
            this.mediator = this.item.mediator;
            this.poster_id = this.item.poster_id;
            this.instrument_image = this.item.instrument_image;
            this.lng=this.item.lng;
            this.lat=this.item.lat
            this.user_id=this.item.user_id
        }

    },

    methods: {
        initMap() {
            var lat = this.lat ? Number(this.lat) : 21.485674380022413;
            var lng = this.lng ? Number(this.lng) : 39.19268294201652;

            var pos = {
                lat: lat,
                lng: lng
            };
            // console.log(pos);
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: pos
            });

            var myLatLng = {lat: pos.lat, lng: pos.lng};

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });
            this.lat = marker.getPosition().lat();
            this.lng = marker.getPosition().lng();

            google.maps.event.addListener(map, 'click', function(event) {
                marker.setPosition(event.latLng);
                this.lat = marker.getPosition().lat();
                this.lng = marker.getPosition().lng();
            }.bind(this));

            // console.log(this.lat,this.lng)

        },
        save() {
            let url = this.item ? `${BASE_URL}/offers/${this.item.id}` : `${BASE_URL}offers`;
            let method = this.item ? 'PUT' : 'POST';

            this.saveForm(url, method, `${BASE_URL}/offers`, {
                client_id: this.client_id,
                order_type: this.order_type,
                real_estate_type: this.real_estate_type,
                city: this.city,
                neighborhood: this.neighborhood,
                space: this.space,
                price: this.price,
                limit: this.limit,
                no_planned: this.no_planned,
                no_piece: this.no_piece,
                mediator: this.mediator,
                poster_id: this.poster_id,
                details: this.details,
                instrument_image: this.instrument_image,
                lng:this.lng,
                lat:this.lat,
                user_id:this.user_id,

            });
        },
        handleAvatarSuccess(response, file) {
            console.log(response);
            this.avatarLoading=false;
            if(response && response.image) this.instrument_image = response.image;
        },
        addClient(){
          $('#showModal').modal('show');
        },
        saveClient(){
            axios.post(`${BASE_URL}/clients`,{
                name: this.name,
                mobile: this.mobile,
                tel: this.tel,
                email: this.email,
                ID_no: this.ID_no,
                company_name:this.company_name,
                job:this.job,
            }).then(response => {
                this.clients=this.clients;
                $('#showModal').modal('hide');
                location.reload();
            }).catch(error => {
                hideLoading();
                swalError(error);
            });
        }

    },

    computed: {

    },

    components: {
        // [Switch.name] : Switch,
        Upload,
        Select
    }
});
