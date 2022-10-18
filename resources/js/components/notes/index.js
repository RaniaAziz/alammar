Vue.component('notes-index', {
    data() {
        return {
            data:[],


        }
    },
    mounted() {
        this.$on('userDeleted', id => {
            this.$refs.table.refresh();
        });
    },

    methods: {

        async fetchData({ page, filter, sort }) {
            const response = await axios.get(`${BASE_URL}/notes/data`, {params: { page, filter, sort }});
            this.loading = false;
            return {
                data: response.data.items.data,
                pagination: {
                    currentPage: response.data.items.current_page,
                    totalPages: response.data.items.last_page
                }
            };
        },

    }
})
