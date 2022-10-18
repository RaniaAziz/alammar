//import {Switch} from 'element-ui'
import {Upload} from 'element-ui'

Vue.component('posters-show', {

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


    },

    computed: {

    },

    components: {
    }
});
