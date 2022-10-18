Vue.component('orders-index', {
    data() {
        return {
            data:[],
            order_no:null,
            real_estate_type:null,
            status:null,
            real_estate_type_arr:[
                {id:'flat', name:'شقة'},
                {id:'fella', name:'فلة'},
                {id:'land', name:'أرض'},
                {id:'rest', name:'استراحة'},
            ],
            status_arr:[
                {id:'new', name:'جديد'},
                {id:'received', name:'مستلم'},
                {id:'finished', name:'منتهي'},
            ],
            space_from:null,
            space_to:null,
            price_from:null,
            price_to:null,
            city:null,
            neighborhood:null,
            auth_user:CURRENT_USER,


        }
    },
    mounted() {
        this.$on('userDeleted', id => {
            this.$refs.table.refresh();
        });
    },

    methods: {

        async fetchData({ page, filter, sort }) {
            const response = await axios.get(`${BASE_URL}/orders/data`, {params: { page, filter:{
                order_no:this.order_no,
                status: this.status,
                real_estate_type: this.real_estate_type,
                space_from:this.space_from,
                space_to:this.space_to,
                price_from:this.price_from,
                price_to:this.price_to,
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
            this.order_no = null
            this.real_estate_type= null
            this.status= null
            this.neighborhood= null
            this.city= null
            this.space_from= null
            this.space_to= null
            this.price_from= null
            this.price_to= null
            this.$refs.table.refresh();
        },
        changStatus(id,item){
            axios.post(`${BASE_URL}/orders/changeStatus`, {
                order_id:id,
                status: item,

            })
                .then(function (response) {
                    location.reload()
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    }
})
