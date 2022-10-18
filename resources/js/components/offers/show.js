//import {Switch} from 'element-ui'
import {Upload} from 'element-ui'

Vue.component('offers-show', {

    props: {
        item: Object,
        item_notes:null,

    },

    data() {
        return {
            offer_id: null,
            notes: null,

        }
    },

    mounted() {

    },

    methods: {
        save() {
            axios.post(`${BASE_URL}/notes`, {
                offer_id: this.item.id,
                type:'offer',
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
