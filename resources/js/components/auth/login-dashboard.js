
Vue.component('login-dashboard', {
    data() {
        return {
            email: null,
            password: null,
            remember: false,

            form: {
                disabled: false,
                error: false,
                validations: [],
                message: null,
            },
        }
    },

    methods: {
        login() {
            console.log('dfghjk0');
            this.form.disabled = true;
            axios.post('/login', {
                email: this.email,
                password: this.password,
                remember: this.remember,
            }).then(response => {
                location.href = '/home';
            }).catch(error => {
                this.form.disabled = false;
                this.form.error = true;
                if(error.response.data.errors) {
                    this.form.message = error.response.data.message;
                    this.form.validations = error.response.data.errors;
                }
            })
        }
    },
});
