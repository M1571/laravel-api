/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

 window.axios = require('axios');

 window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//  importo vue

 window.Vue = require('vue');
 import App from './views/App.vue'

//  istanza vue

const app = new Vue({
    el: '#root',
    render: h => h(App)
});
