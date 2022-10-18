import {Upload} from 'element-ui'
import {Select} from 'element-ui'

Vue.component('mediators-form', {

    props: {
        item: Object,
        clients:null,

    },

    data() {
        return {
            client_id: null,
            city: null,
            neighborhood: null,
            specialty: null,
            job: null,
            employer: null,
            details:null,
            image: null,
            headers_crsf: {
                'X-CSRF-TOKEN': c_token,
            },
            name: null,
            mobile: null,
            tel: null,
            ID_no: null,
            email: null,
            client_job: null,
            company_name:null,
           }
    },

    mounted() {
        if(this.item) {
            this.client_id = this.item.client_id;
            this.city = this.item.city;
            this.neighborhood = this.item.neighborhood;
            this.specialty = this.item.specialty;
            this.job = this.item.job;
            this.employer = this.item.employer;
            this.details = this.item.details;
            this.image = this.item.file;


        }

    },

    methods: {
        save() {
            let url = this.item ? `${BASE_URL}/mediators/${this.item.id}` : `${BASE_URL}/mediators`;
            let method = this.item ? 'PUT' : 'POST';

            this.saveForm(url, method, `${BASE_URL}/mediators`, {
                client_id: this.client_id,
                city: this.city,
                neighborhood: this.neighborhood,
                specialty: this.specialty,
                job: this.job,
                employer: this.employer,
                details: this.details,
                file: this.image,

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
                job:this.client_job,
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
