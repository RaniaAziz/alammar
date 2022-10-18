//import {Switch} from 'element-ui'
import {Upload} from 'element-ui'

Vue.component('orders-show', {

    props: {
        item: Object,
        item_notes:null,
    },

    data() {
        return {
            order_id: null,
            notes: null,
         }
    },

    mounted() {

    },

    methods: {
        save() {

            // let url = '/notes';
            // let method = 'POST';
            //
            // this.saveForm(url, method, location.reload(), {
            //     order_id: this.item.id,
            //     notes: this.notes,
            //
            // });
            axios.post(`${BASE_URL}/notes`, {
                order_id: this.item.id,
                type:'order',
                notes: this.notes,
            })
                .then(function (response) {
                    location.reload()
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

    },

    computed: {

    },

    components: {
    }
});
