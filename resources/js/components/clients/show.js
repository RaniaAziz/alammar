//import {Switch} from 'element-ui'
import {Upload} from 'element-ui'

Vue.component('clients-show', {

    props: {
        item: Object,

    },

    data() {
        return {
            data:[],

        }
    },

    mounted() {


    },

    methods: {
        async fetchOrdersData({ page, filter, sort }) {
            const response = await axios.get(`${BASE_URL}/clients/orders/`+this.item.id, {params: { page, filter, sort }});
            this.loading = false;
            return {
                data: response.data.items.data,
                pagination: {
                    currentPage: response.data.items.current_page,
                    totalPages: response.data.items.last_page
                }
            };
        },

        async fetchOffersData({ page, filter, sort }) {
            const response = await axios.get(`${BASE_URL}/clients/offers/`+this.item.id, {params: { page, filter, sort }});
            this.loading = false;
            return {
                data: response.data.items.data,
                pagination: {
                    currentPage: response.data.items.current_page,
                    totalPages: response.data.items.last_page
                }
            };
        },



    },

    computed: {

    },

    components: {
    }
});
