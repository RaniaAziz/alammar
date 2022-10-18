import {Upload} from 'element-ui'
import {Select} from 'element-ui'

Vue.component('notes-form', {

    props: {
        item: Object,
        orders:null,

    },

    data() {
        return {
            order_id: null,
            notes: null,

            headers_crsf: {
                'X-CSRF-TOKEN': c_token,
            },


        }
    },

    mounted() {
        if(this.item) {
            this.order_id = this.item.order_id;
            this.notes= this.item.notes;
        }

    },

    methods: {
        save() {
            let url = this.item ? `${BASE_URL}/notes/${this.item.id}` : `${BASE_URL}/notes`;
            let method = this.item ? 'PUT' : 'POST';

            this.saveForm(url, method, `${BASE_URL}/notes`, {
                order_id: this.order_id,
                notes: this.notes,

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
