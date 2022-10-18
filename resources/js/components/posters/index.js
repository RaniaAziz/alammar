Vue.component('posters-index', {
    data() {
        return {
            data:[],
            poster_no:null,
            city:null,
            neighborhood:null,

        }
    },
    mounted() {
        this.$on('userDeleted', id => {
            this.$refs.table.refresh();
        });
    },

    methods: {

        async fetchData({ page, filter, sort }) {
            const response = await axios.get(`${BASE_URL}/posters/data`, {params: { page, filter:{
                        poster_no:this.poster_no,
                        city:this.city,
                        neighborhood:this.neighborhood,
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
            this.poster_no = null
            this.city= null
            this.neighborhood= null
            this.$refs.table.refresh();
        },
    }
})
