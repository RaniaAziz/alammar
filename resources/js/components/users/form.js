//import {Switch} from 'element-ui'
import {Upload} from 'element-ui'

Vue.component('users-form', {

    props: {
        item: Object,

    },

    data() {
        return {
            name: null,
            mobile: null,
            email: null,
            password: null,


        }
    },

    mounted() {
        if(this.item) {
            this.name = this.item.name;
            this.mobile= this.item.mobile;
            this.email = this.item.email;
            this.password = decrypt(this.item.password);

        }

    },

    methods: {
        save() {
            let url = this.item ? `${BASE_URL}/users/${this.item.id}` : `${BASE_URL}/users`;
            let method = this.item ? 'PUT' : 'POST';

            this.saveForm(url, method, `${BASE_URL}/users`, {
                name: this.name,
                mobile: this.mobile,
                email: this.email,
                password:this.password,
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
