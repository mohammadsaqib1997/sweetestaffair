// $(document).ready(function () {
//     $('#datepicker').datepicker({
//         autoclose: true,
//         startDate: new Date()
//     })
// });

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found!');
}

window.Vue = require('vue');
import SimpleVueValidation from 'simple-vue-validator';
Vue.use(SimpleVueValidation);

import App from './components/prdForm.vue';

const mountEl = document.querySelector('#v-app');

const app = new Vue({
    el: '#v-app',
    components: {
        App
    },
    render: h => {
        const context = {
            props: { ...mountEl.dataset }
        }
        return h(App, context);
    }
});