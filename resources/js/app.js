require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);

Vue.component('contact-component', require('./components/Contact.vue').default);
Vue.component('contact-list-component', require('./components/ContactsList.vue').default);
Vue.component('active-conversation-component', require('./components/ActiveConversation.vue').default);

const app = new Vue({
    el: '#app',
    methods: {
        logout() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    }
});