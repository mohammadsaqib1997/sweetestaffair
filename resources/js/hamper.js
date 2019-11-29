window.Vue = require('vue');
import SimpleVueValidation from 'simple-vue-validator';
Vue.use(SimpleVueValidation);

import hamperForm from './components/hamperForm.vue';
import acrylicForm from './components/acrylicForm.vue';

const app1 = new Vue({
    el: '#v-app-hamper',
    components: {
        hamperForm
    },
    render: h => h(hamperForm)
});

const app2 = new Vue({
    el: '#v-app-acrylic',
    components: {
        acrylicForm
    },
    render: h => h(acrylicForm)
});

$(document).ready(function () {
    $('.slider').slick({
        infinite: true,
        arrows: false,
        // fade: true,
        draggable: true,
        dots: true
    });
})