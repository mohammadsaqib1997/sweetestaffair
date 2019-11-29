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

const app = new Vue({
    el: '#v-app',
    components: {
        App
    },
    render: h => h(App)
});