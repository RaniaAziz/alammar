require('./bootstrap')

window.Vue = require('vue');

require('./components/auth/login-dashboard');


const app = new Vue({
    el: '#app'
});
