window.Vue = require('vue');
import SimpleVueValidation from 'simple-vue-validator';
Vue.use(SimpleVueValidation);

import App from './components/luxuryBoxForm.vue';

const app1 = new Vue({
    el: '#v-app',
    components: {
        App
    },
    render: h => h(App)
});