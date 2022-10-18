import {Upload} from 'element-ui'
import {Select} from 'element-ui'

Vue.component('orders-form', {

    props: {
        item: Object,
        clients:null,
        users:null,

    },

    data() {
        return {
            client_id: null,
            order_type: 'rent',
            real_estate_type: 'flat',
            city: null,
            neighborhood: null,
            space_from: null,
            space_to: null,
            price_from: null,
            price_to: null,
            details: null,

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
            name: null,
            mobile: null,
            tel: null,
            ID_no: null,
            email: null,
            job: null,
            company_name:null,
            user_id:null,
            disabled:false,
           }
    },

    mounted() {
        if(this.item) {
            this.client_id = this.item.client_id;
            this.order_type= this.item.order_type;
            this.real_estate_type= this.item.real_estate_type;
            this.city = this.item.city;
            this.neighborhood = this.item.neighborhood;
            this.space_from = this.item.space_from;
            this.space_to = this.item.space_to;
            this.price_from = this.item.price_from;
            this.price_to = this.item.price_to;
            this.details = this.item.details;
            this.user_id = this.item.user_id;

        }

    },

    methods: {
        save() {
            let url = this.item ? `${BASE_URL}/orders/${this.item.id}` : `${BASE_URL}/orders`;
            let method = this.item ? 'PUT' : 'POST';

            this.saveForm(url, method, `${BASE_URL}/orders`, {
                client_id: this.client_id,
                order_type: this.order_type,
                real_estate_type: this.real_estate_type,
                city: this.city,
                neighborhood: this.neighborhood,
                space_to: this.space_to,
                space_from: this.space_from,
                price_from: this.price_from,
                price_to: this.price_to,
                details: this.details,
                user_id:this.user_id,

            });
        },
        handleAvatarSuccess(response, file) {
            console.log(response);
            this.avatarLoading=false;
            if(response && response.image) this.image = response.image;
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
