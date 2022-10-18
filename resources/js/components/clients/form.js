//import {Switch} from 'element-ui'
import {Upload} from 'element-ui'

Vue.component('clients-form', {

    props: {
        item: Object,

    },

    data() {
        return {
            name: null,
            mobile: null,
            tel: null,
            ID_no: null,
            image: null,
            email: null,
            job: null,
            details:null,
            company_name:null,
            headers_crsf: {
                'X-CSRF-TOKEN': c_token,
            },

        }
    },

    mounted() {
        if(this.item) {
            this.name = this.item.name;
            this.mobile= this.item.mobile;
            this.tel= this.item.tel;
            this.ID_no = this.item.ID_no;
            this.image = this.item.file;
            this.email = this.item.email;
            this.company_name = this.item.company_name;
            this.details=this.item.details;
            this.job=this.item.job;

        }

    },

    methods: {
        save() {
            let url = this.item ? `${BASE_URL}/clients/${this.item.id}` : `${BASE_URL}/clients`;
            let method = this.item ? 'PUT' : 'POST';

            this.saveForm(url, method, `${BASE_URL}/clients`, {
                name: this.name,
                mobile: this.mobile,
                tel: this.tel,
                email: this.email,
                image: this.image,
                ID_no: this.ID_no,
                company_name:this.company_name,
                job:this.job,
                details:this.details,
            });
        },
        handleAvatarSuccess(response, file) {
            console.log(response);
            this.avatarLoading=false;
            if(response && response.image) this.image = response.image;
        },

    },

    computed: {

    },

    components: {
        // [Switch.name] : Switch,
        Upload,
    }
});
