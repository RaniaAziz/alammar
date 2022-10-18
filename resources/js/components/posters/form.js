import {Upload} from 'element-ui'
import {Select} from 'element-ui'

Vue.component('posters-form', {

    props: {
        item: Object,

    },

    data() {
        return {
            poster_no: null,
            size: 'S',
            type: 'for_rent',
            status: 'new',
            image: null,
            headers_crsf: {
                'X-CSRF-TOKEN': c_token,
            },
            size_arr:[
                {id:'S', name:'S'},
                {id:'M', name:'M'},
                {id:'L', name:'L'},
                {id:'XL', name:'XL'},
            ],
            type_arr:[
                {id:'for_rent', name:'للايجار'},
                {id:'for_sale', name:'للبيع'},
                {id:'for_waive', name:'للتنازل'},
                {id:'wanted', name:'مطلوبة'},
            ],
            status_arr:[
                {id:'new', name:'جديدة'},
                {id:'old', name:'قديمة'},
                {id:'missing', name:'مفقودة'},
                {id:'archived', name:'مؤرشفة'},
            ]

        }
    },

    mounted() {
        if(this.item) {
            this.poster_no = this.item.poster_no;
            this.size= this.item.size;
            this.type= this.item.type;
            this.status = this.item.status;
            this.image = this.item.image;

        }

    },

    methods: {
        save() {
            let url = this.item ? `${BASE_URL}/posters/${this.item.id}` : `${BASE_URL}/posters`;
            let method = this.item ? 'PUT' : 'POST';

            this.saveForm(url, method, `${BASE_URL}/posters`, {
                poster_no: this.poster_no,
                size: this.size,
                type: this.type,
                status: this.status,
                image: this.image,

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
        Select
    }
});
