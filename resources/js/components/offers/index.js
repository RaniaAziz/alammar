Vue.component('offers-index', {
    data() {
        return {
            data:[],
            offer_no:null,
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
            space:null,
            price:null,
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
            const response = await axios.get(`${BASE_URL}/offers/data`, {params: { page, filter:{
                        offer_no:this.offer_no,
                status: this.status,
                real_estate_type: this.real_estate_type,
                space:this.space,
                price:this.price,
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
            this.offer_no = null
            this.real_estate_type= null
            this.status= null
            this.neighborhood= null
            this.city= null
            this.space= null
            this.price= null
            this.$refs.table.refresh();
        },

        changStatus(id,item){
            axios.post(`${BASE_URL}/offers/changeStatus`, {
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
