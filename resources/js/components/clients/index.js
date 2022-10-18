Vue.component('clients-index', {
    data() {
        return {
            data:[],
            name:null,
            mobile:null,
            email:null,

        }
    },
    mounted() {
        this.$on('userDeleted', id => {
            this.$refs.table.refresh();
        });
    },

    methods: {

        async fetchData({ page, filter, sort }) {
            const response = await axios.get(`${BASE_URL}/clients/data`, {params: { page, filter:{
                name:this.name,
                email:this.email,
                mobile:this.mobile,
                    }, sort }});
            this.loading = false;
            return {
                data: response.data.items.data,
                pagination: {
                    currentPage: response.data.items.current_page,
                    totalPages: response.data.items.last_page
                }
            };
        },
        search(){
            this.fetchData(1, [], []);
            this.$refs.table.refresh();
        },
        cancel(){
            this.name = null
            this.email= null
            this.mobile= null
            this.$refs.table.refresh();
        },
    }
})
