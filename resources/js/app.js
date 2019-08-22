require('./bootstrap');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import store from './store';

Vue.use(BootstrapVue);

Vue.component('messenger-component', require('./components/Messenger.vue').default);
Vue.component('contact-component', require('./components/Contact.vue').default);
Vue.component('contact-list-component', require('./components/ContactsList.vue').default);
Vue.component('active-conversation-component', require('./components/ActiveConversation.vue').default);
Vue.component('message-conversation-component', require('./components/MessageConversation.vue').default);
Vue.component('conversation-status-component', require('./components/StatusComponent.vue').default);
Vue.component('user-profile-component', require('./components/UserProfile.vue').default);
Vue.component('contact-form-component', require('./components/SearchContactBar.vue').default);


const app = new Vue({
    el: '#app',
    store,
    methods: {
        logout() {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    }
});