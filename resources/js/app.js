require('./bootstrap');

window.Vue = require('vue');

import BootstraVue from 'bootstrap-vue';

Vue.use(BootstraVue);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    methods: {
        logout() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    }
});