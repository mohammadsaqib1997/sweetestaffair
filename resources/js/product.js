// $(document).ready(function () {
//     $('#datepicker').datepicker({
//         autoclose: true,
//         startDate: new Date()
//     })
// });


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